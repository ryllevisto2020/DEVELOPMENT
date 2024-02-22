class student{//class
    student_id;
    student_name;
    constructor(set_id,set_name){
        this.student_id=set_id;
        this.student_name=set_name;
    }
    get(){//function
        return {id:this.student_id,name:this.student_name}
    }
}
export default student;