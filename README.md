# sql-to-json
Easily export mysql to json string with php

1 - Import the demo database

2 - Start index.php


## USAGE :
```php
$json->addSql("data","SELECT col1 as data1, col2 FROM demo");
```

## OUTPOUT :
```json
{  
   "data":[  
      {  
         "data1":"data1",
         "col2":"data2"
      },
      {  
         "data1":"data3",
         "col2":"data4"
      }
   ],
}
```
