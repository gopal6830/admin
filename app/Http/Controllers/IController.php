<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\admin;
use Crypt;
use DB;
use Illuminate\Support\Facades\File; 
use boolean;
use Storage;
use Session;
use App\Models\pagesummary;
use App\Models\categorysummary;
use App\Models\productsummary;


class IController extends Controller
{
 // public function index()
 //    {
 //        return view('login');
 //    }  
 //    public function postLogin(Request $request)
 //    {
 //        $request->validate([
 //            'username' => 'required',
 //            'password' => 'required',
 //        ]);

 //        $credentials = $request->only('username', 'password');
 //        if (admin::attempt($credentials)) {
 //            return redirect()->intended('pagemanager')
 //                        ->withSuccess('You have Successfully loggedin');
 //        }

 //        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
 //    }
    public function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $count = admin::select('*')
            ->where('username', $username)
            ->where('password', $password)
            ->count();
        if ($count > 0) {
            session()->put("session", $username);
            return redirect('pagemanager');
        } else {
            return back()->withErrors(['login not successfull']);
        }
    }
//for insert
    public function add_page()
    {
        return view("addpage");
    }
    public  function pagesubmit(Request $request)

    {
        // dd($request->all());
        $status = (isset($_POST['status']) ?'1' : '0');
        $this->validate($request, ['name'=>'required']);
        $this->validate($request, ['content'=>'required']);
        

        $add=new pagesummary;
        if($request->isMethod('post'))
        {
            $add->name=$request->get('name');
            $add->content=$request->get('content');
            $add->status=$status;
            $add->save();
        }
        return redirect("/addpage");
    }




    public function pagemanager()
    {
        $data = DB::select('select * from pagesummary');
        return view('pagemanager',['data'=>$data]);
    }


    public function pagedelete($id)
    {
        $ob=pagesummary::find($id);
        // first it will find the id then by deletefunction it deletes the selected id data
        $ob->delete();
        return redirect('pagemanager');
    }
    public function pageedit($id)
    {
        $findrec=pagesummary::where('id',$id)->get();
        echo $findrec; 
        // // where will find that id amd get return that record
        return view('addpage',compact('findrec'));
    }
    public function editdata(Request $request, $id='')
    {
        $add=pagesummary::find($id);
        if($request->isMethod('post'))
        {
           $add->name=$request->get('name');
           $add->content=$request->get('content');
           $status = (isset($_POST['status']) ?'1' : '0');
           $add->status=$status;
           $add->save();
       }
       return redirect("/pagemanager");

   }
   public function searchpage(Request $request)
   {
    if($request->isMethod('post'))
    {
        $name=$request->get('name');
        $data=pagesummary::where('name','LIKE','%'.$name. '%')->get();
    }
    return view('pagemanager',compact('data')); 
}










public function addcat()
{
    return view("addcat");
}
public  function catsubmit(Request $request)

{
        // dd($request->all());
    $this->validate($request, ['name'=>'required']);


    $add=new categorysummary;
    if($request->isMethod('post'))
    {
        $add->cname=$request->get('cname');
        $add->save();
    }
    return redirect("/addcat");
}
public function categorysummary()
{
    $data = DB::select('select * from categorysummary');
    return view('catsummary',['data'=>$data]);
}
public function catdelete($id)
{
    $ob=categorysummary::find($id);
        // first it will find the id then by deletefunction it deletes the selected id data
    $ob->delete();
    return redirect('catsummary');
}
public function catedit($id)
{
    $findrec=categorysummary::where('id',$id)->get();
    echo $findrec; 
        // // where will find that id amd get return that record
    return view('addcat',compact('findrec'));
}


public function updatecat(Request $request, $id='')
{
    $add=categorysummary::find($id);
    if($request->isMethod('post'))
    {
        $add->cname=$request->get('cname');
        $add->save();
    }
    return redirect("/catsummary");

}

public function searchcat(Request $request)
{
     if($request->isMethod('post'))
    {
        $name=$request->get('namess');
        $data=categorysummary::where('namess','LIKE','%'.$name. '%')->get();
    }
    return view('catsummary',compact('data')); 
}


public function passupdate($password)
{
    $findrec=login::where('password',$password)->get();
    echo $findrec; 
        // // where will find that id amd get return that record
    return view('changepass',compact('findrec'));
}

















public function addpro()
{
    $data = DB::select('select * from categorysummary');
    return view('addpro',compact('data'));

}
public  function prosubmit(Request $request)

{
        // dd($request->all());
    $this->validate($request, ['name'=>'required']);
    $this->validate($request, ['price'=>'required']);
    $this->validate($request, ['description'=>'required']);


    $add=new productsummary;
    if($request->isMethod('post'))
    {
        $add->cname=$request->get('cname');
        $add->name=$request->get('name');
        $add->price=$request->get('price');
        $add->description=$request->get('description');
        if(!empty($request->file('pimage')))
        {
            $file=$request->file('pimage');
            $current=uniqid(Carbon::now()->format('YmdHs'));
            $file->getClientOriginalName();
            $file->getClientOriginalExtension();
            $fullfilename=$current.".".$file->getClientOriginalExtension();
            $desinationPath = public_path('upload_image');
            $file->move($desinationPath,$fullfilename);
            $add->image=$fullfilename;
        }


        $add->save();
    }
    return redirect("/addpro");
}
public function prosummary()
{
    $data = DB::select('select * from productsummary');
    return view('prosummary',['data'=>$data]);
    
}

public function prodelete($id)
// 
{
    $ob = productsummary::find($id);
    $image = productsummary::find($id);
    $image = $image->image;
    $filepath = "upload_image/" . $image;
    if (File::exists(public_path($filepath))) {
        File::delete(public_path($filepath));
        $ob->delete();
    }
    return redirect('prosummary');
}


public function searchpro(Request $request)
{
    if($request->isMethod('post'))
    {
        $name=$request->get('name');
        $data=productsummary::where('cname','LIKE','%'.$name. '%')->get();
    }
    return view('prosummary',compact('data')); 
}


public function proedit($id)
{

    $findrec=productsummary::where('id',$id)->get();
    $data=productsummary::paginate(5);
    echo $findrec; 
        // where will find that id amd get return that record
    return view('addpro',compact('findrec','data'));
}
// public function proupdate(Request $request, $id='')
// {
//     $add=productsummary::find($id);
//     if($request->isMethod('post'))
//     {
//         $add->name=$request->get('name');
//         $add->name=$request->get('price');
//         $add->name=$request->get('description');
//        if(!empty($request->file('image')))
//         {
//             $file=$request->file('image');
//             $current=uniqid(Carbon::now()->format('YmdHs'));
//             $file->getClientOriginalName();
//             $file->getClientOriginalExtension();
//             $fullfilename=$current.".".$file->getClientOriginalExtension();
//             $desinationPath = public_path('upload_image');
//             $file->move($desinationPath,$fullfilename);
//             $add->image=$fullfilename;
//         }
//         $add->save();
//     }
//     return redirect("/prosummary");

// }
public function proupdate(Request $request, $id)
{
    $add = productsummary::find($id);
    if ($request->isMethod('post')) {
        $add->cname = $request->get('cname');
        $add->name = $request->get('name');
        $add->price = $request->get('price');
        $add->description = $request->get('description');

        if (!empty($request->file('pimage'))) {
            $file = $request->file('pimage');
            $current = uniqid(Carbon::now()->format('YmdHs'));
            $file->getClientOriginalName();
            $file->getClientOriginalExtension();
            $fullfilename = $current . "." . $file->getClientOriginalExtension();
            $filepath = public_path('upload_image');
            $file->move($filepath, $fullfilename);
            $add->image = $fullfilename;    
        }

        $add->save();
    }
    return redirect('prosummary')->with('message', 'Inserted successfully');
}

//confrim oldpasswo
public function oldpass(Request $request)
    {

        if ($request->isMethod('post')) {
            $username = $request->session()->get('session');
            $password = $request->get('oldpass');
            $data = admin::select('*')
                ->where('username', $username)
                ->where('password', $password)
                ->first();
            $count = admin::select('*')
                ->where('username', $username)
                ->where('password', $password)
                ->count();
            if ($count > 0) {
                $id = $data->id;
                return view('/changepass', compact('id'));
            } else {
                return back()->withErrors(['Password does not match']);
            }
        }
    }

    //create new pass
    public function newpass(Request $request)
    {
        if ($request->isMethod('post')) {
            $id = $request->get('id');
            $data = admin::find($id);
            $data->password = $request->get('newpass');
            $data->save();
        }
        return redirect('login')->withErrors('Password changed successfully');
    }








        // $pass= admin::where("password",$req->input('password'))->get();


       // // dd($req->all());
       //  $add = $req->input();
       //  $req->session()->put('username',$data['user']);
       //  echo session('username');
       // // return ($user[0]->password);


}
