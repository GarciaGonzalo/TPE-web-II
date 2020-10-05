<?php
class SeasonController
{
    private $model;
    function __construct()
    {
        $this->model = new SeasonModel;
    }

    function GetSeasons()
    {
       return $this->model->GetSeasons();
    }
}
