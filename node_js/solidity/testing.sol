pragma solidity ^0.4.11;

contract Register {
   struct newUser{
    uint id;
	string name;
	string email;	
	string password;
	uint age;
	string add;
	uint mobile;
	uint status;
	string message;
    string image_hash;
    uint time_stamp;
    uint blockNumber;
   }
   
   struct log{
    string[] logData;
    uint count;
   }
   
   struct electionData{
   uint id;
   uint[100] candidateList;
   uint[100] participantList;
   string start;
   string stop;
   }

    mapping (string => log) logData;
    mapping (uint => newUser) user;
    mapping (uint=>electionData) edata;

    uint public count = 0;
    
    function registerUser(uint id,string name, string email, string password, uint age, string add,uint mobile, uint status,string message,string image_hash){
    uint time_stamp=Time_call();
    uint blockNumber=block.number;
    user[count]=newUser(id, name, email, password, age, add, mobile, status, message, image_hash,time_stamp,blockNumber);
    count++;
    }
    
    function Time_call() returns (uint256)
    {
        return now;
    }
    
   function getCount() public view returns (uint counter) {
        counter=count;
        return counter;
    }
    
    function check_latest(string electronicmail) returns (uint256)
    {
        uint latest_time=0;
        uint id=0;
        for(var i=0;i<count;i++)
            {   
                if(sha3(user[i].email) == sha3(electronicmail))
                
                {    if(user[i].time_stamp>latest_time)
                       {
                            latest_time=user[i].time_stamp;
                            id=i;
                        }
                }
            }
        return id;    
    }
    
    function getUserByEmail(string electronicmail)
    constant returns (uint id, string name, string email, string password, uint age, string add,uint mobile, uint status , string image_hash)
    {
        uint id_latest=check_latest(electronicmail);
        
        id=user[id_latest].id;
	    name=user[id_latest].name;
	    email=user[id_latest].email;
        password=user[id_latest].password;
        age=user[id_latest].age;
        add=user[id_latest].add;
        mobile=user[id_latest].mobile;
        status=user[id_latest].status;	
        image_hash=user[id_latest].image_hash;
        
        return;

    }
    function getUserByID(uint ID)
    constant returns (string email)
    {   
        email=user[ID].email;
        return;

    }
     function getUserByEmailForRegistration(string electronicmail)
    constant returns (uint id, string name, string email, string password, uint age, string add,uint mobile, uint status , string image_hash)
    {
        for(uint i=0;i<count;i++)
        {
            
            if(sha3(user[i].email) == sha3(electronicmail))
            {
            id=user[i].id;
	        name=user[i].name;
	        email=user[i].email;
            password=user[i].password;
            age=user[i].age;
            add=user[i].add;
            mobile=user[i].mobile;
            status=user[i].status;	
            image_hash=user[i].image_hash;
            }
        }
        return;

    }
    
    function returnBlockNumber(string electronicmail)
    constant returns (uint blockNumber)
    {
        uint id_latest=check_latest(electronicmail);
        blockNumber=user[id_latest].blockNumber;
    }
    
    function addLogData(string electronicmail, string logValue)
    {
        logData[electronicmail].logData.push(logValue);
        logData[electronicmail].count++;
    }
    
    function getLogCount(string electronicmail) constant returns (uint counting) 
    {
        counting=logData[electronicmail].count;
        return;
    
    }
    function getLogDataByCount(string electronicmail,uint id) constant returns (string date)
    {
        date=logData[electronicmail].logData[id];
        return;
    }
    
    function addElectionCandidate(uint electionID,string candidate)
    {
        uint cid;
        for(uint i=0;i<count;i++)
            {
                if(sha3(user[i].email)==sha3(candidate))
                    {
                        cid=user[i].id;
                        break;
                    }
            }
        edata[electionID].candidateList[cid]=999;
    }
    function addElectionParticipant(uint electionID,string participant)
    {
        uint pid;
        for(uint i=0;i<count;i++)
            {
                if(sha3(user[i].email)==sha3(participant))
                    {
                        pid=user[i].id;
                        break;
                    }
            }
        edata[electionID].participantList[pid]=999;
    }
    function addStartStop(uint electionID,string start,string stop)
    {
        edata[electionID].start=start;
        edata[electionID].stop=stop;
        edata[electionID].id=electionID;
    }
    function returnElectionID(uint electionID) constant returns (uint eid,string start,string stop)
    {
        eid=edata[electionID].id;
        stop=edata[electionID].stop;
        start=edata[electionID].start;
        return;
    }
    function returnCandidateList(uint electionID,uint id) constant returns (string candidate)
    {
        if(edata[electionID].candidateList[id]!=0)
        
            {uint cid=id;
            for(uint i=0;i<count;i++)
                {
                    if(user[i].id==cid)
                    {
                    candidate=user[i].email;
                    return;
                    }
                    
                }
            }
        
    }
    function checkIfVoted(uint electionID,uint id) constant returns (bool a)
    {
        if(edata[electionID].participantList[id]==999)
            {return false;}
        else 
            {return true;}
    }
    function returnParticipantList(uint electionID,uint id) constant returns (string participant)
    {
        if(edata[electionID].participantList[id]!=0)
        
            {uint pid=id;
            for(uint i=0;i<count;i++)
                {
                    if(user[i].id==pid)
                    {
                    participant=user[i].email;
                    return;
                    }
                    
                }
            }
    }
    function votingInfo(uint electionID,uint cid,uint pid)
    {   
        edata[electionID].participantList[pid]=cid;
    }
    function testing(uint electionID,uint pid) constant returns (uint va)
    {
        va=edata[electionID].participantList[pid];
        return;
    }
    
    function allEdits(uint count, string electronicmail) constant returns (string name, string email, string password,uint age,string image_hash,uint time_stamp, uint mobile,string add)
    {
        if(sha3(electronicmail)==sha3(user[count].email))
            {
                add=user[count].add;
                name=user[count].name;
                email=user[count].email;
                password=user[count].password;
                age=user[count].age;
                image_hash=user[count].image_hash;
                time_stamp=user[count].time_stamp;
                mobile=user[count].mobile;
            }
        else
            {
                add="NULL";
            }
        return;
    }
}
