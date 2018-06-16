<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Filesystem\FileNotFoundException;
use App\Item;

class ItemController extends Controller
{
    protected $item;
    protected $filename = 'items.json';

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'create_at' => date('Y-s-d G:i:s'),
        ];

        $data = json_encode($data);

        File::append($this->filename, $data);

        return $this->getContent();
    }

    public function getContent()
    {
        try{
            $contents = File::get($this->filename);

            return $contents;
        }
        catch (FileNotFoundException $exception)
        {
            die("The file doesn't exist");
        }
    }
}
