<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackSubmitRequest;
use App\Models\Admin\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Feedback = Feedback::getAllFeedback();

        return view('Admin.Feedback.Feedback', compact(
            'Feedback'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function FeedbackForm()
    {
        return view('Admin.Feedback.Feedback_form');
    }
    
    public function FeedbackSubmit(FeedbackSubmitRequest $request)
    {   $title = $request->title;
        $send_date = $request->send_date;
        $name = $request->name;
        $email = $request->email;
        $id_customer_info = $request->id_customer_info;
        // $order_date = $request->order_date;
        // $address = $request->address;
        $content = $request->content;
        
        

        $Feedback= Feedback::createFeedback($title, $send_date, $name, $email, $id_customer_info, $content, 0);

        return redirect()->route('admin.Feedback.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
