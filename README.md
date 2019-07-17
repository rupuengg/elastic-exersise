# Init

Index page where you can see two link one for add data and other for view single doc

## Common Class

It's use for read from reading, writing and viewing doc from elasticsearch

```bash
class Common{
    private $filename;
    private $client;

    public function __construct($filename){
        $this->filename = DIR_PATH.'/upload/'.$filename;
        $this->client = Elasticsearch\ClientBuilder::create()->build();
    }

    public function read(){
        $fp = fopen($this->filename, 'rb');

        while(($line = fgets($fp)) !== false)
            yield rtrim($line, "\r\n");

        fclose($fp);
    }

    public function insert(){
        foreach($this->read() as $line){
            $res = json_decode($line);

            $response = $this->client->index(array_merge($this->makeIndex($res->id), ['body' => $res->doc]));
        }
    }

    public function makeIndex($docId){
        return [
            'index' => 'my1_index',
            'id' => $docId
        ];
    }

    public function getDoc($docId){
        return $this->client->get($this->makeIndex($docId));
    }
}
```