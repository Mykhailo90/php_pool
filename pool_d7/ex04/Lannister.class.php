<?php
Class Lannister{
    public function sleepWith($who){
        if ($who instanceof Cersei && $this->name === "Jaime") {
            echo "With pleasure, but only in a tower in Winterfell, then.\n";
        }
        else if ($who instanceof Jaime && $this->name === "Tyrion"){
            echo "Not even if I'm drunk !\n";
        }
        else if ($who instanceof Tyrion && $this->name === "Jaime"){
            echo "Not even if I'm drunk !\n";
            return ;
        }
        else if ($who instanceof Cersei && $this->name === "Tyrion"){
            echo "Not even if I'm drunk !\n";
        }
        else{
            echo "Let's do this.\n";
        }
    }
}
