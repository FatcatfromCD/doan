<?php 
namespace App\Helpers;
use App\categories;

class Helper
{

    public function call($txt ='', $id, $count =0)
    {
       $all_child = categories::where('parent_id', $id)->get();

        
       if(count($all_child) > 0 )
       {

      
       	  $txt .= "<ul class='dropdown-menu' role='menu'>";

       	foreach ($all_child as $key => $value) 
       	{

          $txt.= "<li><a href='" . route('category', ['id' => $value->id, 'theloai' => $value->name]). "'>" . $value->name . "</a></li>";


       	}

  
       	  $txt .= "</ul>";

       }
       return $txt;
    }

    public function get_path($cat_id)
    {
      $result = '';
      $cat = categories::find($cat_id);
      if( $cat->parent_id != 0 )
      {
        $f_cat = categories::find($cat->parent_id);
        $result .= "<li><a href='" . route('category', ['id' => $f_cat->id, 'theloai' => $f_cat->name]) . "'>" . $f_cat->name . "</a></li>";

        $result .= "<li class='active'><a href='" . route('category', ['id' => $cat->id, 'theloai' => $cat->name]) . "'>" . $cat->name . "</a></li>";
      }
      else
      {
                $result .= "<li class='active'><a href='" . route('category', ['id' => $cat->id, 'theloai' => $cat->name]) . "'>" . $cat->name . "</a></li>";
      }
      return $result;
    }
}