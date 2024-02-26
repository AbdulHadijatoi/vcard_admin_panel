<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplatesController extends AppBaseController {

    public function index() {
        $templates = EmailTemplate::get();
        return view('email_templates.index', compact("templates"));
    }
    
    public function edit($id) {
        $template = EmailTemplate::findOrFail($id);
        return view('email_templates.edit', compact('template'));
    }
    
    public function update($id, Request $request) {

        $template_name = $request->template_name;
        $content = $request->content;
        // $subject = $request->subject;
        $template = EmailTemplate::findOrFail($id);

        if($template_name){
            $template->template_name = $template_name;
        }
        
        if($content){
            $template->content = $content;
        }


        // if($subject){
        //     $template->subject = $subject;
        // }

        $template->updated_at = now();
        $template->save();
        return redirect()->route('sadmin.emailTemplates.index')->with("success","Successfully updated!");
    }
    

}
