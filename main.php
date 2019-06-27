<?php 

class Promise  
{
    public function __construct($callback)
    {
        $this->callback = $callback(function($resolve) {
            $this->then = $resolve;
        }, function($resolve) {
            $this->then = $resolve;
        });
        return $this;
    }

    public function then($callback)
    {
        return $callback($this->then);
    }
}

$data = (new Promise(function($resolve, $reject) {
    if(true) {
        $resolve('başarılı');
    } else {
        $reject('başarısız !');
    }
}))->then(function($passed_data) {
    echo $passed_data;
});

// var_dump($data);


?>