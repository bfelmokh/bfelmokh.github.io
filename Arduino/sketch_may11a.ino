const int sensorPin=A1;
const int LDR=A5;
const int ledPin= 13;
const int threshold=800;
int valldr=0;
void setup()
{
pinMode(ledPin, OUTPUT);
pinMode(3, OUTPUT);
Serial.begin(9600);

}

void loop()
{
valldr=analogRead(LDR);
Serial.println(valldr);
delay(10);
if (valldr <= 1000) {
int val= analogRead(sensorPin);
Serial.println(val);
if (val >= threshold)
{
digitalWrite(ledPin, HIGH);
analogWrite(3,255);
delay(500);
digitalWrite(ledPin, LOW);
analogWrite(3,8);
}
else  {
analogWrite(3,8);
digitalWrite(ledPin, LOW);
}
}
else
analogWrite(3,0);
}
