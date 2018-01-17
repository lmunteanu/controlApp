SELECT *
FROM `control`
WHERE (data_control BETWEEN '2017-07-30' AND '2017-08-29')


SELECT * FROM `firma` f 
LEFT JOIN `control` c 
ON (f.id_firma = c.cid_firma)
WHERE 'denumire_unitate' LIKE '%fotbal%'
AND (data_control is NULL 
      OR 
      data_control = (
      SELECT MAX(data_control)
      FROM `control` c2
      WHERE (c2.cid_firma = f.id_firma)
      )
   )
ORDER BY `denumire_unitate` ASC


SELECT * FROM `firma` f 
LEFT JOIN `control` c 
ON (f.id_firma = c.cid_firma) 
WHERE 'denumire_unitate' LIKE '%fotbal%'
AND (data_control is NULL 
      OR 
      data_control = (
      SELECT MAX(data_control)
      FROM `control` c2
      WHERE (c2.cid_firma = f.id_firma)
      )
   )
ORDER BY `denumire_unitate` ASC