#include <Servo.h>
Servo S1,S2,S3,S4,S5,S6;
String x,temp;
    String input,inputs[25];
    int pos=0;
    int i=0;
void getAction(String x);
void setServo(Servo n , String value);
void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  S1.attach(9);
  S2.attach(10);
  S3.attach(3);
  S6.attach(11);
  S5.attach(5);
  S3.attach(6);
}
void loop() {
  // put your main code here, to run repeatedly:
if(Serial.available()>0){
    x = Serial.readString();
    Serial.println(x);
    getAction(x);
}
}
void getAction(String y) { 
    Serial.println(y[0]);
    switch(y[0]) { 
        case 'P':
            for(i=0;i<pos;i++){
                Serial.println(inputs[i]);
                setServo(S1 ,inputs[i].substring(1,4));
                setServo(S2 ,inputs[i].substring(4,7));
                setServo(S3 ,inputs[i].substring(7,10));
                setServo(S4 ,inputs[i].substring(10,13));
                setServo(S5 ,inputs[i].substring(13,16));
                setServo(S6 ,inputs[i].substring(16,19));
                delay(500);
            }           
            Serial.println("=========");
        break; 
        case 'L': 
                Serial.println("its live");
        //temp="";
                setServo(S1 ,y.substring(1,4));
                setServo(S2 ,y.substring(4,7));
                setServo(S3 ,y.substring(7,10));
                setServo(S4 ,y.substring(10,13));
                setServo(S5 ,y.substring(13,16));
                setServo(S6 ,y.substring(16,19));
                //temp=x;
        break;
        case 'S':
            inputs[pos]=y;
            pos++;
        break;        
        default :
        Serial.println("nothing to do");
        }
        if(y[0]=='q'){
            return;
        }
        Serial.println("* next value ");
}
void setServo(Servo n , String value){
  n.write(value.toInt());
  Serial.println(value);
}
