<?php

class ERichiesta
{
private string $disco;
private string $data;

    public function __construct(string $disc, string $dat){
        $this->disco = $disc;
        $this->data = $dat;
    }


    /**
     * @return string
     */
    public function getDisco(): string
    {
        return $this->disco;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }


    /**
     * @param string $disco
     */
    public function setDisco(string $disco): void
    {
        $this->disco = $disco;
    }

    /**
     * @param string $data
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }


}