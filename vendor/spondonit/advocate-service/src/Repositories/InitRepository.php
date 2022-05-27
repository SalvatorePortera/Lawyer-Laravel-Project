<?php

namespace SpondonIt\AdvocateService\Repositories;

use Modules\RolePermission\Entities\Role;
use Illuminate\Support\Facades\Schema;
use Modules\Setting\Model\GeneralSetting;
use Modules\Setting\Model\DateFormat;
use Modules\Setting\Entities\Config;

class InitRepository {

    public function init() {
		config([
            'app.item' => '31004954',
            'spondonit.module_manager_model' => \Modules\ModuleManager\Entities\InfixModuleManager::class,
            'spondonit.module_manager_table' => 'infix_module_managers',

            'spondonit.settings_model' => \Modules\Setting\Entities\Config::class,
            'spondonit.module_model' => \Nwidart\Modules\Facades\Module::class,

            'spondonit.user_model' => \App\User::class,
            'spondonit.settings_table' => 'general_settings',
            'spondonit.database_file' => '',
        ]);
    }

    public function config()
	{
        app()->singleton('general_settings', function () {
               return GeneralSetting::first();
            });


        app()->singleton('configs', function () {
            return Config::all();
        });

		app()->singleton('permission_list', function() {
            return Role::with(['permissions' => function($query){
                $query->select('route','module_id','parent_id','role_id');
            }])->get(['id','name']);
        });

		if(Schema::hasTable('configs')){
            config([
                'settings' => app('general_settings'),
               'configs' => app('configs')
            ]);

            $dateformat = app('configs')->where('key','date_format_id')->first()?app('configs')->where('key','date_format_id')->first()->value:1;
            config([
                'date_format' => DateFormat::find($dateformat)->format
            ]);
        }

	}

}
