<?php

/*****************************************************/
/*           Coder:Andre Luiz                        */
/* https://www.linkedin.com/in/andre-luiz-790599182/ */
/* https://www.facebook.com/andreluizprogramadorweb  */
/* algweb.com.br                                     */
/*****************************************************/

$coin = array("ETH","BTC","LTC","BCH");
$obj = json_decode(file_get_contents("https://www.mercadobitcoin.net/api/".$coin[1]."/ticker/"));

class getTiket{
	private $obj;
	function __construct($obj)
	{
		$this->obj = $obj;
	}
    public function crypto(){
		$alta = $this->obj->ticker->high;
		$baixa = $this->obj->ticker->low;
		$volume = $this->obj->ticker->vol;
		$ultima = $this->obj->ticker->last;
		$compra = $this->obj->ticker->buy;
		$venda = $this->obj->ticker->sell;
		$aberto = $this->obj->ticker->open;
		$data = $this->obj->ticker->date;
		return json_encode(array("alta"=>$alta,"baixa"=>$baixa,"volume"=>$volume,"compra"=>$compra,"venda"=>$venda,"aberto"=>$aberto,"data"=>date('d.m.Y H:i:s',$data)));
    }
}
$crypto = new getTiket($obj);
echo $crypto->crypto();
?>
