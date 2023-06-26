<?php namespace MarlonFreire\Multimoneda;

use System\Classes\PluginBase;
use Lovata\Shopaholic\Models\Product;
use Lovata\Shopaholic\Models\Currency;
use Lovata\Shopaholic\Controllers\Products;


class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
    
    public function boot(){
        Product::extend(function ($model) {
            $model->addFillable(['currency_id']);
            
            $model->addCachedField(['currency_id']);
        
            $model->belongsTo['currency'] = [
                Currency::class,
                'key' => 'currency_id',
            ];
        });
        
        //Agregar fields
        Products::extendFormFields(function($form, $model, $context) {
            if (!$model instanceof Product) {
                return;
            }
        
              //Agregar a fields.yaml
              $form->addTabFields([
                'currency' => [
                    'label' => 'Currency',
                    'span' => 'left',
                    'type' => 'relation',
                    'tab' => 'lovata.toolbox::lang.tab.settings'
                ]
            ]);
        
        });
        
    }
}
