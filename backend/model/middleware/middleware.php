<?php


class Middleware
{

    private int $type;
    private string $tmpLogFilePath;

    public function __construct(int $type)
    {
        $this->type = $type;
        $this->tmpLogFilePath = __DIR__ . "/../log/logs.txt";
    }

    public function execute()
    {
        if ($this->type === 0) {
            $this->before();
        } else if ($this->type === 1) {
            $this->after();
        }
    }

    private function before()
    {
        $this->log("before");
    }
    private function after()
    {
        // sleep(5); // has error
        $this->log("after");
    }

    private function log(string $status)
    {
        $content = file_get_contents($this->tmpLogFilePath);
        file_put_contents($this->tmpLogFilePath, $content . "\n it is working " . $_SERVER["HTTP_USER_AGENT"] . $status . "!" . time());
    }
}
