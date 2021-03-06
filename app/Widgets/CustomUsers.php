<?php

namespace App\Widgets;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

use TCG\Voyager\Widgets\BaseDimmer;

class CustomUsers extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = User::count();
        $string = 'user';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-file-text',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.page_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => 'View all User',
                'link' => route('voyager.users.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return true;
    }
}
    //     $count = User::count();
    //     $string = trans_choice('voyager::dimmer.user', $count);

    //     return view('voyager::dimmer', array_merge($this->config, [
    //         'icon'   => 'voyager-group',
    //         'title'  => "{$count} {$string}",
    //         'text'   => __('voyager::dimmer.user_text', ['count' => $count, 'string' => Str::lower($string)]),
    //         'button' => [
    //             'text' => __('voyager::dimmer.user_link_text'),
    //             'link' => route('voyager.users.index'),
    //         ],
    //         'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
    //     ]));
    // }

    // /**
    //  * Determine if the widget should be displayed.
    //  *
    //  * @return bool
    //  */
    // public function shouldBeDisplayed()
    // {
    //     // return Auth::user()->can('browse', Voyager::model('User'));
    //     return true;
    // }
// }