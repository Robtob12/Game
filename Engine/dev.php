<?php

// # CREAR MAPA //

# SAY

function SAY($arg = null, $arg2 = null, $arg3 = null, $arg4 = null, $arg5 = null, $arg6 = null){
    $list = [$arg,$arg2,$arg3,$arg4, $arg5, $arg6];
    
    foreach($list as $ar){
        if(is_array($ar)  OR is_object($ar)){
            var_dump($ar);
        } else{
            echo $ar;
        }
    }
}

# READ

function READ(string $arg = ""){
    if($arg !== ""){
        SAY($arg);
        return fgets(STDIN);
    }

    return fgets(STDIN);
}

# CONSOLE

function CONSOLE(string $arg){
    $shell = shell_exec($arg);
    SAY($shell);
    return $shell;
}

# CLEAR

function CLEAR(){
    switch(PHP_OS){
        case "Linux":
            CONSOLE("clear");
        break;
        case "Windows":
            CONSOLE("cls");    
        break;
        default:
            SAY("SYSTEM not recognized!");
        break;
    }
}

# WAIT

function WAIT(float $timeout = 1){
    usleep((int) ($timeout * 1000000));
}

# EFFECT

function EFFECT($method, $arg){
    if($method === "Animation String"){
        $animation = str_split($arg);
        foreach($animation as $str){
            $t = random_int(0.5, 2) / 10;
            SAY($str);
            WAIT($t);
        }
    }
}

# COLOR

function COLOR(string $arg, string $color){
    switch ($color) {

        case "black":
            $c = "[30m";
            break;

        case "red":
            $c = "[31m";
            break;

        case "green":
            $c = "[32m";
            break;

        case "yellow":
            $c = "[33m";
            break;

        case "blue":
            $c = "[34m";
            break;

        case "magenta":
            $c = "[35m";
            break;

        case "cyan":
            $c = "[36m";
            break;

        case "white":
            $c = "[37m";
            break;

        default:
            $c = "[0m";
            break;
    }

    return "\033" . $c . $arg . "\033[0m";
}

# RANDOM

function RANDOM(int $min = 0, int $max = 1){
    return random_int($min, $max);
}


// # GUARDAR PUNTAJE # //

class DB{
    private PDO $pdo;

    # CONSTRUCTOR

    public function __construct(string $host,string $database,string $user,string $password) {
        $this->pdo = new PDO(
            "mysql:host=$host;dbname=$database;charset=utf8mb4",
            $user,
            $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    # CREATE

    public function Create(string $table, array $data): bool{
        $columns = implode(", ", array_keys($data));

        $values = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        $query = $this->pdo->prepare($sql);

        return $query->execute($data);
    }

    # READ

    public function Read(string $table,array $rules = []): array {

        $sql = "SELECT * FROM $table";

        $params = [];

        if (!empty($rules)) {

            $conditions = [];

            foreach ($rules as $column => $value) {

                $conditions[] = "$column = :$column";

                $params[$column] = $value;
            }

            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $query = $this->pdo->prepare($sql);

        $query->execute($params);

        return $query->fetchAll();
    }

    # UPDATE

    public function Update(string $table,array $data,array $rules): bool {

        $set = [];

        $params = [];

        foreach ($data as $column => $value) {

            $set[] = "$column = :set_$column";

            $params["set_$column"] = $value;
        }

        $where = [];

        foreach ($rules as $column => $value) {

            $where[] = "$column = :where_$column";

            $params["where_$column"] = $value;
        }

        $sql = "UPDATE $table
                SET " . implode(", ", $set) . "
                WHERE " . implode(" AND ", $where);

        $query = $this->pdo->prepare($sql);

        return $query->execute($params);
    }

    # DELETE

    public function Delete(string $table,array $rules): bool {

        $where = [];

        $params = [];

        foreach ($rules as $column => $value) {

            $where[] = "$column = :$column";

            $params[$column] = $value;
        }

        $sql = "DELETE FROM $table
                WHERE " . implode(" AND ", $where);

        $query = $this->pdo->prepare($sql);

        return $query->execute($params);
    }

}

// # ENVIO DE DATOS # //

# CURL
class CURL{

    private static function Request(string $url,string $method = "GET",array $params = []) {

        if ($url === "" || !filter_var($url, FILTER_VALIDATE_URL)) {
            return "URL inválida";
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($method === "POST") {

            curl_setopt($ch, CURLOPT_POST, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Content-Type: application/json"
            ]);

            curl_setopt(
                $ch,
                CURLOPT_POSTFIELDS,
                json_encode($params)
            );
        }

        $response = curl_exec($ch);

        return json_decode($response, true);
    }

    public static function GET(string $url){
        return self::Request($url);
    }

    public static function POST(string $url, array $params = []){
        return self::Request($url, "POST", $params);
    }
}

# GET_JSON

function GET_JSON(){
    return json_decode(file_get_contents("php://input")) ?? null;
}

# APP_JSON

function APP_JSON($data){
    header("Content-Type: application/json");
    echo json_encode($data);
}

# HTTP_CODE

class HTTP_CODE{
    // 2xx - Success

    public static function OK(){
        http_response_code(200);
    }

    public static function CREATED(){
        http_response_code(201);
    }

    public static function ACCEPTED(){
        http_response_code(202);
    }

    public static function NO_CONTENT(){
        http_response_code(204);
    }


    // 4xx - Client Errors

    public static function BAD_REQUEST(){
        http_response_code(400);
    }

    public static function UNAUTHORIZED(){
        http_response_code(401);
    }

    public static function FORBIDDEN(){
        http_response_code(403);
    }

    public static function NOT_FOUND(){
        http_response_code(404);
    }

    public static function METHOD_NOT_ALLOWED(){
        http_response_code(405);
    }

    public static function CONFLICT(){
        http_response_code(409);
    }

    public static function UNPROCESSABLE_ENTITY(){
        http_response_code(422);
    }

    public static function TOO_MANY_REQUESTS(){
        http_response_code(429);
    }


    // 5xx - Server Errors

    public static function INTERNAL_ERROR(){
        http_response_code(500);
    }

    public static function NOT_IMPLEMENTED(){
        http_response_code(501);
    }

    public static function BAD_GATEWAY(){
        http_response_code(502);
    }

    public static function SERVICE_UNAVAILABLE(){
        http_response_code(503);
    }

    public static function GATEWAY_TIMEOUT(){
        http_response_code(504);
    }
}