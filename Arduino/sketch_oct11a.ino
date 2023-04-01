int S = 9,RO = 3,LO = 6;
int sp=0;
String x,temp;
void getAction(String x);
void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  pinMode(3, OUTPUT);
  pinMode(6, OUTPUT);
  pinMode(9, OUTPUT);
  digitalWrite(S,HIGH);
  digitalWrite(RO,LOW);
  digitalWrite(LO,LOW);
}

void loop() {
  // put your main code here, to run repeatedly:
  Serial.println(temp+"/"+x);
  if(Serial.available()>0){
    x = Serial.readString();
    //Serial.println(x);
    if (x!=""){
      //temp=x;
      getAction(x);
    }
  } else {
    //Serial.println(x);
    getAction(x);
  }
}
void getAction(String y) { 
  //Serial.println(y[0]);
  switch(y[0]){
  case 'S': 
    digitalWrite(RO,LOW);
    digitalWrite(LO,LOW);
    if (y[1]=='B'){
    digitalWrite(S,LOW);
    delay(y.substring(2,3).toInt()*100);
    digitalWrite(S,HIGH);
    delay(y.substring(2,3).toInt()*100);
    digitalWrite(S,LOW);
    delay(y.substring(2,3).toInt()*100);
  }else{
    digitalWrite(S,HIGH);
  }
  break;
  case 'R' :    
    digitalWrite(S,LOW);
    digitalWrite(RO,LOW);
    delay(y.substring(2,3).toInt()*100);
    digitalWrite(RO,HIGH);
    delay(y.substring(2,3).toInt()*100);
    digitalWrite(RO,LOW);
    delay(y.substring(2,3).toInt()*100);
    break;
  case 'L' :    
    digitalWrite(S,LOW);
    digitalWrite(LO,LOW);
    delay(y.substring(2,3).toInt()*100);
    digitalWrite(LO,HIGH);
    delay(y.substring(2,3).toInt()*100);
    digitalWrite(LO,LOW);
    delay(y.substring(2,3).toInt()*100);
    break;
  case 'T' :
    digitalWrite(S,LOW);
    if (y[1]=='B'){
      digitalWrite(LO,LOW);
      digitalWrite(RO,HIGH);
      delay(y.substring(2,3).toInt()*100);
      digitalWrite(LO,HIGH);
      digitalWrite(RO,LOW);
      delay(y.substring(2,3).toInt()*100);
      digitalWrite(LO,LOW);
      digitalWrite(RO,HIGH);
      delay(y.substring(2,3).toInt()*100);
    } else {
      digitalWrite(LO,LOW);
      digitalWrite(RO,LOW);
      delay(y.substring(2,3).toInt()*100);
      digitalWrite(LO,HIGH);
      digitalWrite(RO,HIGH);
      delay(y.substring(2,3).toInt()*100);
      digitalWrite(LO,HIGH);
      digitalWrite(RO,HIGH);
      delay(y.substring(2,3).toInt()*100);      
    }
    break;
    case 'W' :    
    digitalWrite(LO,LOW);
    digitalWrite(S,HIGH);
    digitalWrite(RO,LOW);
    delay(y.substring(1,2).toInt()*100);
    digitalWrite(LO,LOW);
    digitalWrite(S,LOW);
    digitalWrite(RO,HIGH);
    delay(y.substring(1,2).toInt()*100);
    digitalWrite(LO,LOW);
    digitalWrite(S,HIGH);
    digitalWrite(RO,LOW);
    delay(y.substring(1,2).toInt()*100);
    digitalWrite(LO,HIGH);
    digitalWrite(S,LOW);
    digitalWrite(RO,LOW);    
    delay(y.substring(1,2).toInt()*100);
    digitalWrite(LO,LOW);
    digitalWrite(S,HIGH);
    digitalWrite(RO,LOW);
    break;
}
}
