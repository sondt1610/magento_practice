1. Query  all  product  name  for  store  English  level  

SELECT entity_id, value FROM catalog_product_entity_varchar
  WHERE store_id = (
    SELECT store_id FROM store
    WHERE name='English'
  )
  AND attribute_id = (
    SELECT attribute_id FROM eav_attribute
    WHERE entity_type_id= (
        SELECT entity_type_id FROM eav_entity_type
        WHERE entity_type_code ='catalog_product'
      )
      AND attribute_code='name'
  )

2. Query  all  customer  name,  customer  address

select 
    email, CONCAT(a.firstname, " ", a.lastname, "\n") AS "Full name", 
    CONCAT(a.street, " ", a.city, "\n") AS "Full address"
from
    customer_entity as c
        inner join
    customer_address_entity as a ON a.parent_id = c.entity_id
