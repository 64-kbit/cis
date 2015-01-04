<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php

class Calendar extends DataMapper{
    public $table = 'cis_college_callender_event';
    function __construct($id = null){
        parent::__construct($id);
    }

    function add_sem_event($data,$uid){
        $this->where(array('end_date'=>date('Y-m-d h:i:s',strtotime($data['sem_end_date'])),'start_date'=>date('Y-m-d h:i:s',strtotime($data['sem_start_date'])),'event_category_id'=>$data['event_cat']))->get();

        if(!$this->result_count()){
            $this->start_date = date('Y-m-d h:i:s',strtotime($data['sem_start_date'])) ;
            $this->end_date =date('Y-m-d h:i:s',strtotime($data['sem_end_date'])) ;
            $this->event_category_id = $data['event_cat'];
            $this->comments = $data['wadau_wote'];
            $this->academic_year_id = $data['itemid'];
            $info = $this->save_as_new();
            $eid = $this->db->insert_id();

        }else{
            $this->comments = $data['wadau_wote'];
            $this->save();
           $eid = $this->id;
            $info= $this->save();
        }
        $emEv = new SemesterCalendar();
        $in = array('suc'=>0,'fai'=>0);
        if($info){
            foreach($data['semesters_list'] as $id => $sem){
                $dt = explode('-',$sem);
                $emEv->where(array('event_category_id'=> $data['event_cat'],'semester_id'=>$dt[1],'sem_structure_id'=>$dt[0],'academic_year_id'=>$this->academic_year_id))->get();
                $emEv->status = 1;

                $emEv->event_id = $eid;
                $emEv->event_category_id =   $this->event_category_id ;
                $emEv->semester_id = $dt[1];
                $emEv->academic_year_id = $this->academic_year_id;
                $emEv->sem_structure_id = $dt[0];
                if(!$emEv->result_count()){
                    $status =   $emEv->save_as_new();
                    if($status){
                        $in['suc'] += 1;
                    }else{
                        $in['fai'] += 1;
                    }
                }else{
                   // $this->save();
                    $in['fai'] += 1;
                }
            }

            // Find other event with this category make sure it does not overlap with this new event
            $this->where(array('end_date >'=>$this->start_date,'event_category_id'=>$this->event_category_id,'id !='=> $eid,'academic_year_id'=>$this->academic_year_id))->get();
            if($this->result_count()){
                $this->end_date = date('Y-m-d h:i:s',strtotime($data['sem_start_date'])) ;
                $this->save();
            }

            return array("error"=>($in['fai']>0?true:false),'message'=>"Semesters: Added {$in['suc']} and Already Exists: {$in['fai']}");

        }else{
            return array("error"=>true,'message'=>"Failed to Set The Event");
        }

    }

    function get_all_events($start,$end,$serialize = false){
       $sql = "SELECT event.*,cat.title as ev_title,cat.description as ev_desc,cat.parent_event_id,parent.title as par_title,sem_evt.semester_id,event.comments
       FROM cis_college_callender_event as event
       join cis_college_callender_event_category as cat on event.event_category_id = cat.id
       left join cis_college_callender_event_category as parent on parent.id = cat.parent_event_id
       left join cis_college_callender_semester as sem_evt on sem_evt.event_id = event.id
       where (event.start_date <= '$end' and event.end_date >= '$end') or (event.end_date between '$start' and '$end') group by sem_evt.event_id";


        $result = $this->db->query($sql);
         $data = array();
        if($serialize){
              if($result->num_rows()){
                  foreach($result->result_array() as $id => $row){
                      $data[] = array(
                          'title' => $row['ev_title'] ."-". ($row['semester_id']?$row['comments']:""),
                          'start' => $row['start_date'],
                          'end' => $row['end_date'],
                          'color'=>'#ffa',
                          'text-color'=>"#555",
                          'allday' => false,
                          'editable' =>true,
                      );
                  }
              }else{
                  return array();
              }
            return ($data);
        }else{

            return $result->result_array();
        }

    }

   function get_sem_events(){
        $sql = "SELECT sem_evt.*,sem.name, sem.display_name,sem.comments,sem.year_count FROM cis_college_callender_semester as sem_evt
         join cis_semester as sem on sem.id = sem_evt.semester_id
         where sem_evt.event_id = {$this->id} group by sem.id";
       $resutt = $this->db->query($sql);

       return $resutt->result_array();
   }
} 
