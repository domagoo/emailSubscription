<?php

function readLines($filename)
{

        $fileResource= fopen($filename, 'r');

        if(!is_resource($fileResource))
        {
                exit ("Could not open the file for reading.");
        }

        $contents= array();

        while($line = fgets($fileResource))
        {
        $contents[]= $line;
        }
        fclose($fileResource);
        return $contents;
}


function appendLine($filename, $line)
{

        $fileResource= fopen($filename, 'a');

        if(!is_resource($fileResource))
        {
                exit ("Could not open the file for appending.");
        }

        fwrite($fileResource, $line);
        fclose($fileResource);

        return null;
}


function deleteLine($filename, $lineNumber)
{
        $contents= readLines($filename); //put everythihng in contents

        unset($contents[$lineNumber]);

        $fileResource= fopen($filename, 'w'); //throw everything away
        if(!is_resource($fileResource))
        {
                exit ("Could not open the file for deleting.");
        }

  $contents= readLines($filename); //put everythihng in contents

        unset($contents[$lineNumber]);

        $fileResource= fopen($filename, 'w'); //throw everything away
        if(!is_resource($fileResource))
        {
                exit ("Could not open the file for deleting.");

        }
        
        foreach($contents as $contentLine)
        {
                fwrite($fileResource,$contentLine); //puts it back
        }
        fclose($fileResource);
        return null;
}