<?php

namespace Ninja;

class DatabaseTable
{
    private $pdo;
    private $table;
    private $primaryKey;
    private $className;
    private $constructorArgs;
    

    public function __construct(\PDO $pdo, string $table, string $primaryKey, string $className = '\stdClass',
    array $constructorArgs = [])
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->className = $className;
        $this->constructorArgs = $constructorArgs;
    }

    private function query($sql, $parameters = [])
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($parameters);
        return $query;
    }

    public function total()
    {
        $query = $this->query('SELECT COUNT(*) FROM `' . $this->table . '`');
        $row = $query->fetch();
        return $row[0];
    }

    public function findById($value)
    {
        $query = 'SELECT * FROM `' . $this->table . '` WHERE `' . $this->primaryKey . '` = :value';

        $parameters = [
            'value' => $value
        ];

        $query = $this->query($query, $parameters);

        return $query->fetchObject($this->className, $this->constructorArgs);
    }

    private function insert($fields)
    {
        $query = 'INSERT INTO `' . $this->table . '` (';

        foreach ($fields as $key => $value) {
            $query .= '`' . $key . '`,';
        }

        $query = rtrim($query, ',');

        $query .= ') VALUES (';


        foreach ($fields as $key => $value) {
            $query .= ':' . $key . ',';
        }

        $query = rtrim($query, ',');

        $query .= ')';

        $fields = $this->processDates($fields);

        $this->query($query, $fields);
    }

    private function update($fields)
    {
        $query = ' UPDATE `' . $this->table .'` SET ';

        foreach ($fields as $key => $value) {
            $query .= '`' . $key . '` = :' . $key . ',';
        }

        $query = rtrim($query, ',');

        $query .= ' WHERE `' . $this->primaryKey . '` = :primaryKey';

        //Set the :primaryKey variable
        $fields['primaryKey'] = $fields['id'];

        $fields = $this->processDates($fields);

        $this->query($query, $fields);
    }

    public function delete($id)
    {
        $parameters = [':id' => $id];

        $this->query('DELETE FROM `' . $this->table . '` WHERE `' . $this->primaryKey . '` = :id', $parameters);
    }

    public function findAll()
    {

        $result = $this->query('SELECT * FROM ' . $this->table);

        return $result->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
    }

    public function find($column, $value) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE ' .
        $column . ' = :value';
        $parameters = [
        'value' => $value
        ];
        $query = $this->query($query, $parameters);
        return $query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
    }

    private function processDates($fields)
    {
        foreach ($fields as $key => $value) {
            if ($value instanceof DateTime) {
                $fields[$key] = $value->format('Y-m-d');
            }
        }

        return $fields;
    }

    public function save($record)
    {
        try {
            if ($record[$this->primaryKey] == '') {
                $record[$this->primaryKey] = null;
            }
            $this->insert($record);
        } catch (\PDOException $e) {
            $this->update($record);
        }
    }

    /**
     * find by genre-function
     *
     * */
    public function findByGenre($genre)
    {

        $query = $this->pdo->prepare('SELECT * FROM `' . $this->table . '` WHERE `genre` = :genre LIMIT 5');
        $query->bindValue(':genre', $genre);
        $query->execute();
        $rows = $query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
        return $rows;
    }
        
    /**
     * video-page-function
     *
     * */
    public function videoPage($pdo, $genre)
    {

        $query = $pdo->prepare('SELECT * FROM videos WHERE video_genre =:video_genre LIMIT 13');
        $query->bindValue(':video_genre', $genre);
        $query->execute();
        $rows = $query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
        return $rows;
    }
    
    public function findSongId($value)
    {
        $query = "SELECT `audioid` FROM `audio` WHERE `albumid` = $value ";

        $parameters = [
            'value' => $value
        ];

        $query = $this->query($query, $parameters);

        $array = array();

        foreach($query as $row) {
            array_push($array, $row['audioid']);
        }
         

        return $array;
    }

    public function findSongTitle($value)
    {
        $query = "SELECT songtitle FROM `audio` WHERE `audioid` = $value ";

        $parameters = [
            'value' => $value
        ];

        $query = $this->query($query, $parameters);

        $array = array();

        foreach($query as $row) {
            array_push($array, $row['songtitle']);
        }
         

        return $array;
    }

    public function findSongMp3($value)
    {
        $query = "SELECT `mp3_File` FROM `audio` WHERE `audioid` = $value ";

        $parameters = [
            'value' => $value
        ];

        $query = $this->query($query, $parameters);

        $array = array();

        foreach($query as $row) {
            array_push($array, $row['mp3_File']);
        }
         

        return $array;
    }

    public function findSongOgg($value)
    {
        $query = "SELECT `ogg_File` FROM `audio` WHERE `audioid` = $value ";

        $parameters = [
            'value' => $value
        ];

        $query = $this->query($query, $parameters);

        $array = array();

        foreach($query as $row) {
            array_push($array, $row['ogg_File']);
        }
         

        return $array;
    }

    public function findSongM4a($value)
    {
        $query = "SELECT `m4a_File` FROM `audio` WHERE `audioid` = $value ";

        $parameters = [
            'value' => $value
        ];

        $query = $this->query($query, $parameters);

        $array = array();

        foreach($query as $row) {
            array_push($array, $row['m4a_File']);
        }
         

        return $array;
    }

    

           
    
}
