<?php

namespace App;

trait Response
{
    public function createMessage($message, $status = 200) {
        return response()->json($message, $status);
    }
}
