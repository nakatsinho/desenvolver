<?php

namespace APDS\Observers;

use Auth;
use APDS\Models\UserAction;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class UserActionsObserver
{
    public function saved($model)
    {
        if ($model->wasRecentlyCreated == true) {
            // Data was just created
            $action = 'created';
        } else {
            // Data was updated
            $action = 'updated';
        }
        if (FacadesAuth::check()) {
            UserAction::create([
                'user_id'      => FacadesAuth::user()->id,
                'action'       => $action,
                'action_model' => $model->getTable(),
                'action_id'    => $model->id
            ]);
        }
    }


    public function deleting($model)
    {
        if (FacadesAuth::check()) {
            UserAction::create([
                'user_id'      => FacadesAuth::user()->id,
                'action'       => 'deleted',
                'action_model' => $model->getTable(),
                'action_id'    => $model->id
            ]);
        }
    }
}