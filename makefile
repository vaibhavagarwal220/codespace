
CPP = g++
CFLAGS = -Wall -Wextra -g -I

RM = rm 
RMFLAGS = -r -f

LIBS = -lm

SRCS_CONTROLLER = ./src/controller.cpp
SRCS_COMPILER = ./src/compile.cpp
SRCS_RUNNER = ./src/runner.cpp
SRCS_COMPARE = ./src/compare.cpp
SRCS_LIBS = ./lib/*.cpp

INCLUDES = ./include/

all:   clean clean_temp Controller Compile Runner Compare

clean:	
	$(RM) $(RMFLAGS) ./bin/*.EXE

clean_temp:	
	$(RM) $(RMFLAGS) ./tmp/*

Controller:	$(SRCS_CONTROLLER)
	$(CPP) $(CFLAGS) $(INCLUDES) $(SRCS_LIBS) $(SRCS_CONTROLLER) -o ./bin/Controller.EXE  $(LIBS)

Compile:	$(SRCS_COMPILER)
	$(CPP) $(CFLAGS) $(INCLUDES) $(SRCS_LIBS) $(SRCS_COMPILER) -o ./bin/Compile.EXE  $(LIBS)

Runner:	$(SRCS_RUNNER)
	$(CPP) $(CFLAGS) $(INCLUDES) $(SRCS_LIBS) $(SRCS_RUNNER) -o ./bin/Runner.EXE  $(LIBS)

Compare:	$(SRCS_COMPARE)
	$(CPP) $(CFLAGS) $(INCLUDES) $(SRCS_LIBS) $(SRCS_COMPARE) -o ./bin/Compare.EXE $(LIBS) 