// Written by Marc Poul Joseph Laventure

// Declaration of variables
int temperaturePin = 0; // Analop pin at port 0
float temperatureCelsius;

void setup(){
  Serial.begin(9600);
  
}
void loop(){
  temperatureCelsius = analogRead(temperaturePin);
  temperatureCelsius = 5.0*temperatureCelsius*100.0/1024.0;
  Serial.println((byte)temperatureCelsius);
  delay(1000);
}
  
