Query-Query yang mungkin dibutuhkan

select * from ipro_project;
select title,description,date_expired from ipro_project where status = 'publish';
select title,description,category,date_expired from ipro_project, ipro_job_category where status = 'publish' && id = category_id;
select ip.title, is.skill from ipro_skill is,ipro_project_skill ips,ipro_project ip where is.id=ips.skill_id && ips.project_id=ip.project_id;
select title,description,date_expired from ipro_project where status = 'publish' sort by = title asc;
select title,description,date_expired from ipro_project where status = 'publish' sort by = date_expired asc;
select title,description,category,date_expired from ipro_project, ipro_job_category where status = 'publish' && id = category_id && category = $category;