<?php

interface myInterface
{
    public function myFunction();
    public function myOtherFunction();
}

final class myClass implements myInterface
{
    public function myFunction()
    {
        return "This is my function";
    }

    public function myOtherFunction()
    {
        return "This is my other function";
    }
}
