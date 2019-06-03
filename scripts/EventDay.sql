use ageQuodAgis;
SET SQL_SAFE_UPDATES = 0;
drop procedure if exists spDayTask_AddDayUnfinished;

delimiter $
create procedure spDayTask_AddDayUnfinished()
begin
	update day_tasks set date = date_add(date,interval 1 day) where date_format(date,'%y-m%-%d') =date_format(curdate(),'%y-m%-%d') and finished = false ;
end $
delimiter ; 

drop event if exists `update_daily_tasks_event`;
CREATE EVENT IF NOT EXISTS `update_daily_tasks_event`
ON SCHEDULE
  EVERY 1 day
  STARTS date_format(curdate(),'%y-%m-%d 23:55')
  COMMENT 'Adds 1 day to all non finished tasks'
  DO
    call spDayTask_AddDayUnfinished;

show events;