<?php

namespace App\Helper;

class ImageHelper 
{
	private $filename; 

    private function upload($file) 
    {
    	$image_name = time().$file->getClientOriginalName();
    	$file->storeAs('images', $image_name);
    	return $image_name;
    }

    public function save($request, $filename)
    {
		if ( $request->hasFile($filename) ) {
			$image_name = $this->upload($request->$filename);
			return $image_name;
		}
		return null;
    }

    public function update($request, $filename, $hiddenimg)
    {
        if ( $request->hasFile($filename) ) {
            $image_name = $this->upload($request->$filename);
            return $image_name;
        }

        return $hiddenimg;
    }
}