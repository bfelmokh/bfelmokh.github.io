
void setup() {
pinMode(7,OUTPUT);
pinMode(8,OUTPUT);
pinMode(3,OUTPUT);
// put your setup code here, to run once:

}

void loop() {
  // put your main code here, to run repeatedly:
analogWrite(3,2);
digitalWrite(7,HIGH);
digitalWrite(8,LOW);
/*delay(5000);
digitalWrite(7,LOW);
digitalWrite(8,LOW);
delay(500);*/

}
