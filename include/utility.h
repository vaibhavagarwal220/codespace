#ifndef FUNCTIONS_H
#define FUNCTIONS_H

#include <string>

using namespace std;

extern int runner_pid;

bool isNumber(char *);
bool exist_file(std::string str);

template <typename string,typename num>
string itostring(num );

int get_pid(const char* );

void set_runner_pid(int );
int get_runner_pid();

#endif