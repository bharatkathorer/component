<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\LaraFormik\Notification\ToastNotification;
use App\LaraFormik\Table\Action\CustomItem;
use App\LaraFormik\Table\Action\DeleteItems;
use App\LaraFormik\Table\Action\TableActionMenu;
use App\LaraFormik\Table\Filter\CheckBoxInput;
use App\LaraFormik\Table\Filter\RadioInput;
use App\LaraFormik\Table\Filter\SelectInput;
use App\LaraFormik\Table\Filter\SwitchInput;
use App\LaraFormik\Table\Filter\TableFilter;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{

    public function tableActions()
    {
//        DB::beginTransaction();
//        try {
//            switch (Table::getActionId()) {
//                case "paid":
//                    $selectedData = Table::selectedItems();
//                    $selectedData->update([
//                        'university_fees_is_paid' => true
//                    ]);
//                    break;
//            }
//            DB::commit();
//        } catch (\Exception $e) {
//            dd($e->getMessage());
//            DB::rollBack();
//        }
//        dd('okk');
        ToastNotification::error([
            'title' => 'Done',
            'message' => "testing error notification"
        ]);
        return redirect()->back();
    }

    public function index()
    {
        TableActionMenu::make([
            CustomItem::make(User::class, 'paid')->name("Make action 2"),
            DeleteItems::make(User::class)->isConfirm()->name("Remove"),
        ])
            ->isPaginated();


        TableFilter::make([

            SelectInput::make('email')
                ->options(User::query()->pluck('email')->toArray())
                ->label("Course")
                ->multiple()
                ->resetKey(['batch', 'year']),

            SelectInput::make('year')
                ->options(['First Year', 'Second Year', 'Third Year'])
                ->label("Year")
                ->multiple()
                ->resetKey(['batch']),

            SelectInput::make('batch')
                ->options(['2018', '2019', '2020', '2021', '2022', '2023', '2024'])
                ->multiple()
                ->label("Batch"),

            SwitchInput::make('status')
                ->label("Status"),

            RadioInput::make('gender')
                ->label("Gender")
                ->options(['male', 'female', 'other']),

            CheckBoxInput::make('Status')
                ->label("Check")
                ->options(['Active', 'InActive', 'Deleted', 'Open']),

        ])->isFilterButton();

        return Inertia::render('Welcome', [
            'users' => \App\Models\User::query()
                ->when(\request('email'), function ($query) {
                    $ids = TableFilter::getIds(User::class, 'email', 'email');
                    $query->whereIn('id', $ids);
                })
                ->when(request()->get('keyword'), function ($query, $keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                })->when(request()->get('direction'), function ($query) {
                    $query->orderBy(
                        request()->get('sortBy'),
                        request()->get('direction')
                    );
                })
                ->paginate(20),
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
