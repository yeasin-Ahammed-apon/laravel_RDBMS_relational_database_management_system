# laravel 8
__________________________________________

## Mainly  focused on relational database management system

## there is 3 table where i make there relations with query builder

- tables
    - users -->id,name,password
    - type  -->id, name
    - posts -->id, users_id, type_id, name or title, details
## posts.users_id , posts.type_id  will be join with users table users.id and  type table type.id
## then we can show those coloumns we need 