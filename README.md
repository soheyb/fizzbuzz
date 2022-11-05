# FizzBuzz Leboncoin

FizzBuzz made for the Leboncoin technical test.


## Required environment

```
PHP >= 7.2
Mysql 8
Composer
```

## Installation

```bash
composer install
```
Edit the ``.env`` file to match your local environment. 
Then inject ``DB.sql`` to your local Database

## Usage routes


Generate FizzBuzz:
```
GET /
Parameters:
    int1 (mandatory)
    int2 (mandatory)
    word1 (mandatory)
    word2 (mandatory)
    limit (mandatory)
    
Response:
{
    "fizzbuzz": ""
}
```

```http request
/statistics
Parameters:
    
Response:
{
    "parameters": {
        "int1": "",
        "int2": "",
        "word1": "",
        "word2": "",
        "limit": ""
    },
    "count": 
}
```



