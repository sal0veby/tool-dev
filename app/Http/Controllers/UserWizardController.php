<?php
/**
 * Created by PhpStorm.
 * User: igetweb
 * Date: 05-Jul-18
 * Time: 15:32
 */

namespace App\Http\Controllers;


use App\Steps\SetUserNameStep;
use Illuminate\Http\Request;
use Smajti1\Laravel\Exceptions\StepNotFoundException;
use Smajti1\Laravel\Wizard;

class UserWizardController
{
    public $steps = [
        'set-username-key' => SetUserNameStep::class,
//        SetPhoneStep::class,
    ];

    protected $wizard;

    public function __construct()
    {
        $this->wizard = new Wizard($this->steps, $sessionKeyName = 'user');
    }

    public function wizard($step = null)
    {
        try {
            if (is_null($step)) {
                $step = $this->wizard->firstOrLastProcessed();
            } else {
                $step = $this->wizard->getBySlug($step);
            }
        } catch (StepNotFoundException $e) {
            abort(404);
        }

        return view('wizard.user.base', compact('step'));
    }

    public function wizardPost(Request $request, $step = null)
    {
        try {
            $step = $this->wizard->getBySlug($step);
        } catch (StepNotFoundException $e) {
            abort(404);
        }

        $this->validate($request, $step->rules($request));
        $step->process($request);

        return redirect()->route('wizard.user', [$this->wizard->nextSlug()]);
    }

    private function validate($request, $rules)
    {
    }

}