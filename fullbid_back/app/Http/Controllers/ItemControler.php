<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\Input;


class ItemControler extends Controller
{
   function addItem(Request $req){
        $item=new Item();
        $item->itemTitle = $req->input('itemTitle');
        $item->itemDisc=$req->input('itemDisc');
        $item->itemDuration=$req->input('itemDuration');
        $item->itemImage = $req->file('itemImage')->store('products');
        error_log("this is item image".''.$item->itemImage);
        $item->itemStartPrice=$req->input('itemStartPrice');
        $item->currentWinner=$req->input('currentWinner');
        $item->save();

        return $item;
    }
    function list(){
        return Item::all();
    }
    function delete($id){
        $data=Item::where('id',$id)->delete();
        if($data){
            return ["result"=>"hase been deleted"];
        } else
            return "deleting operation failed!";
    }
    function getItem($id){
        // $data=Item::where("id",$id)->get();
        // if(!$data){
        //     return ["item" => "doesnt exist"];
        //   
        // }
        // return $data;
        return Item::find($id);
    }
    function updatePrice(Request $request,$id){
        error_log($request->input('price'));
        $data=Item::where('id',$id)->update(array('itemStartPrice'=>$request->input('price')));
       

        if($data)
    {
            return ["done!"=>"currently you are the winner"];
    } else
            return ["nop!"=>"error"];
    }
    function updateWinner(Request $request,$id){
        error_log($request->input('winner'));
        $data=Item::where('id',$id)->update(array('currentWinner'=>$request->input('winner')));
       

        if($data)
    {
            return ["done!"=>"winner updated "];
    } else
            return ["nop!"=>"winner is not updated error"];
    }
    
    function updateItem(Request $req,$id){
        
       $item=Item::find($id);
       $item->itemTitle = $req->input('itemTitle');
       $item->itemDisc=$req->input('itemDisc');
    //    $item->itemDuration=$req->input('itemDuration');
    //    $item->itemImage=$req->input('itemImage');
        // error_log("image of new update  ".''.$item->itemImage);
        //    $item->itemImage = $req->file('itemImage')->store('products');
        //    $item->itemStartPrice=$req->input('itemStartPrice');
       

            // $dest = './products'.$item->itemImage;
            // if(File::exists($dest)){
            //     File::delete($dest);     
            // }
            // $item->itemImage = $req->file('itemImage')->store('products');
            // $file=$req->file('itemImage');
            // $extension = $file->getClientOriginalExtension();
            // $filename=time().'.'.$extension;
            // $file->move('products', $filename);
            // $item->itemImage=$filename;


       
       
       $item->update();
       return $item;
    }
function search($key){
        return Item::where("itemTitle", "Like", "%$key%")->get();
        // return $key;

}
}
