<?php
interface DBMySqlInterface
{
      public function connect();
      public function query($query_text);
}