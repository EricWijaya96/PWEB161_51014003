class Buku 
{
	private $Judul;
	private $author;
	private $penerbit;
	private $tahun;
	private $isbn;
	
	public function Buku()
	{	//constructor
		$this->judul = "Pemograman Web";
	}

	public function getJUdul()
	{
		return  $this->judul;
	}
}