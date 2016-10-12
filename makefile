
CPP = g++
CFLAGS = -Wall -Wextra -g -Werror -I
LFLAGS = 

RM = rm 
RMFLAGS = -rf 

SRCS = src/

SRCS_COMPILE = src/cpp/compile.cpp
<<<<<<< HEAD
SRCS_EXECUTE = src/cpp/execute.cpp src/cpp/functions.cpp
=======
SRCS_EXECUTE = src/cpp/execute.cpp
>>>>>>> cf78917fad1fa56c32072c159a12c17d7921e0da
SRCS_COMPARE = src/


INCLUDES = include/

LIBS = -lm

all: Controller Compile Execute Compare

clean:	
	$(RM) $(RMFLAGS) bin/*.out tmp/*

clean_temp:
	$(RM) $(RMFLAGS) tmp/*

clean_objects:
<<<<<<< HEAD
	$(RM) $(RMFLAGS) bin/*.out
=======
	&(RM) $(RMFLAGS) bin/*.out
>>>>>>> cf78917fad1fa56c32072c159a12c17d7921e0da

Controller:	

Compile:	$(SRCS_COMPILE)
<<<<<<< HEAD
	$(CPP) $(CFLAGS) $(INCLUDES) -o bin/Compile.out $(SRCS_COMPILE) $(LIBS)
=======
	$(CPP) $(CFLAGS) $(INCLUDES) -o bin/Compile $(SRCS_COMPILE) $(LIBS)
>>>>>>> cf78917fad1fa56c32072c159a12c17d7921e0da

Execute:	$(SRCS_EXECUTE)
	$(CPP) $(CFLAGS) $(INCLUDES) -o bin/Execute.out $(SRCS_EXECUTE) $(LIBS)

Compare: 