<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use function redirect;
use function view;
use function GuzzleHttp\json_encode;


class SearchController extends Controller
{
    function index()
    {
     return view('search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('dzijas')
         ->where('nosaukums', 'like', '%'.$query.'%')
         ->orWhere('apraksts', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
       $data = DB::table('dzijas')
         ->orderBy('ID', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->nosaukums.'</td>
         <td>'.$row->apraksts.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}
