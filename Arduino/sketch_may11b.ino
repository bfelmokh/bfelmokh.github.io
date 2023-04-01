int piezo = 0;

void setup()
{
  pinMode(A5, INPUT);
  Serial.begin(9600);

}

void loop()
{
  piezo = analogRead(A5);
  Serial.println(piezo);
  delay(100); // Delay a little bit to improve simulation performance
}
