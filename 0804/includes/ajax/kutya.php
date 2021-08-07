<?php
class kutya {
    public function __construct($szin,$fajta){
        $this->szin = $szin;
        $this->fajta = $fajta;
    }

    public function szabad_e_simogatni(){
        if($this->fajta == 'puli'){
            return 'ne simogasd mert harap';
        } else {
            return 'simogasd nyugodtan';
        }
    }
}

$barni = new kutya('barna','németjuhász');
$bojtos = new kutya('tarka','puli');

echo $bojtos->szabad_e_simogatni(); // ne simogasd
echo $barni->szabad_e_simogatni(); // simogasd nyugodtan
.
.
.
.
.
unset($barni);