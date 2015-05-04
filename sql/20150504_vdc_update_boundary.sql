-- update table for storing boundary
alter table tbl_district_vdcs add column boundary_coordinate text


-- view used 

CREATE OR REPLACE VIEW vw_vdc_mun_boundary as
SELECT
	dv.id, dv.code, dv.name_en,
	dv.name_np, dv.parent_location_id district_id,
	p.code district_code, p.name_en district_name_en, p.name_np district_name_np
	, dv.hierarchy_level,
	dv.location_type, dv.display_order,
	dv.created_by, dv.modified_by, dv.created_date,
	dv.modified_date, dv.delete_flag, dv.boundary_coordinate
FROM tbl_district_vdcs dv
	LEFT JOIN tbl_district_vdcs p ON dv.parent_location_id = p.id
WHERE dv.location_type ='V' OR dv.location_type ='M'

--select * from vw_vdc_mun_boundary
