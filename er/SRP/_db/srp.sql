
DROP DATABASE IF EXISTS srp;
CREATE DATABASE srp;
USE srp;


CREATE TABLE Users
(
	userId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,	

	login CHAR(30) NOT NULL , 
	password TEXT NOT NULL ,
	
	PRIMARY KEY (userId) ,
	UNIQUE (login)
) TYPE=INNODB;


CREATE TABLE Files
(
	reference CHAR(50) NOT NULL ,
	name TEXT NOT NULL ,
	mime CHAR(50) NOT NULL ,
	size BIGINT NOT NULL DEFAULT 0,
 	description TEXT DEFAULT NULL,

    PRIMARY KEY (reference)
) TYPE=INNODB;


CREATE TABLE Processes
(
	processId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
	name CHAR(60) NOT NULL,
	userId INTEGER UNSIGNED NOT NULL ,
	author CHAR(60) NOT NULL ,
	objective TEXT NOT NULL,
	description TEXT NOT NULL,
	classification ENUM ('fundamental', 'support', 'organizational') NOT NULL ,
	nature ENUM ('framework', 'usual', 'project') NOT NULL ,
	conformity ENUM ('cmm', 'cmmi', 'iso9000-3', 'iso12207') NOT NULL ,
	area ENUM ('requirementsEngineering', 'design', 'construction', 'test', 'implantation', 'generic') NOT NULL ,
	lifeCicle ENUM ('waterfall', 'prototype', 'spiral') NOT NULL ,
	systemType ENUM ('web', 'oo', 'bi', 'transactional', 'hybrid') NOT NULL ,
	organizationSize ENUM ('small', 'average', 'big', 'independent') NOT NULL ,
	projectDuration ENUM ('1-60h', '61-120h', '121-180h', '181-260h', '261-350h', 'above 350h') NOT NULL ,
	teamSize ENUM ('small', 'average', 'big', 'independent') NOT NULL ,
	requiredKnowledge ENUM ('low', 'average', 'high', 'specialist') NOT NULL ,	
	teamLocation ENUM ('local', 'distributed', 'independent') NOT NULL ,
	keyWords TEXT ,
	preCondition TEXT ,
	posCondition TEXT ,

	PRIMARY KEY (processId) ,
	FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE MacroActivities
(
	macroActivityId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,

    macroType ENUM ('usual', 'framework') NOT NULL,
    userId INTEGER UNSIGNED NOT NULL ,
    processId INTEGER UNSIGNED NOT NULL ,
    action CHAR(50) NOT NULL ,
	object CHAR(50) NOT NULL ,
	action_synonymous TEXT ,
	object_synonymous TEXT ,
	description TEXT NOT NULL ,

    priority INTEGER UNSIGNED NOT NULL DEFAULT 0 ,

	# usual fields
	u_reusedFrom INTEGER UNSIGNED DEFAULT NULL ,
	u_preCondition TEXT DEFAULT NULL,
	u_posCondition TEXT DEFAULT NULL,
	u_restriction TEXT DEFAULT NULL,

	# framework fields
	f_type ENUM ('common', 'hot spot') DEFAULT NULL,
	f_caracteristics SET ('essencial', 'recomended', 'analized', 'specific', 'commons', 'optional') DEFAULT NULL,

	PRIMARY KEY (macroActivityId) ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE ,
	FOREIGN KEY (u_reusedFrom) REFERENCES MacroActivities(macroActivityId) ON DELETE SET NULL
) TYPE=INNODB;

CREATE TABLE FrameworkMacroActivityReferences
(
	frameworkMacroActivityId INTEGER UNSIGNED NOT NULL ,
	usualMacroActivityId INTEGER UNSIGNED NOT NULL ,
	similarity ENUM ('-', '=', '+') ,

	UNIQUE (frameworkMacroActivityId, usualMacroActivityId) ,
	FOREIGN KEY (frameworkMacroActivityId) REFERENCES MacroActivities(macroActivityId) ON DELETE CASCADE ,
	FOREIGN KEY (usualMacroActivityId) REFERENCES MacroActivities(macroActivityId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE DetailedActivities
(
	detailedActivityId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,

    detailedType ENUM ('usual', 'framework') NOT NULL,
    userId INTEGER UNSIGNED NOT NULL ,
    macroActivityId INTEGER UNSIGNED NOT NULL ,
	action CHAR(50) NOT NULL ,
	object CHAR(50) NOT NULL ,
	action_synonymous TEXT ,
	object_synonymous TEXT ,
	description TEXT NOT NULL ,

	priority INTEGER UNSIGNED NOT NULL DEFAULT 0 ,

	# usual fields
	u_preCondition TEXT DEFAULT NULL,
	u_posCondition TEXT DEFAULT NULL,
	u_restriction TEXT DEFAULT NULL,
	u_reusedFrom INTEGER UNSIGNED DEFAULT NULL ,

    # framework fields
	f_type ENUM ('common', 'hot spot') DEFAULT NULL,
	f_caracteristics SET ('essencial', 'recomended', 'analized', 'specific', 'commons', 'optional', 'implicit', 'out') DEFAULT NULL,

	UNIQUE (detailedActivityId) ,
	FOREIGN KEY (macroActivityId) REFERENCES MacroActivities(macroActivityId) ON DELETE CASCADE ,
	FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE ,
	FOREIGN KEY (u_reusedFrom) REFERENCES DetailedActivities(detailedActivityId) ON DELETE SET NULL
) TYPE=INNODB;

CREATE TABLE FrameworkDetailedActivityReferences
(
	frameworkDetailedActivityId INTEGER UNSIGNED NOT NULL ,
	usualDetailedActivityId INTEGER UNSIGNED NOT NULL ,
	similarity ENUM ('-', '=', '+') ,

	UNIQUE (frameworkDetailedActivityId, usualDetailedActivityId) ,
	FOREIGN KEY (frameworkDetailedActivityId) REFERENCES DetailedActivities(detailedActivityId) ON DELETE CASCADE ,
	FOREIGN KEY (usualDetailedActivityId) REFERENCES DetailedActivities(detailedActivityId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Aux_Concepts
(
	conceptId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
	userId INTEGER UNSIGNED NOT NULL ,
	
	termName CHAR(50) NOT NULL ,  
	termType ENUM ('business', 'technical') NOT NULL ,
	termDescription TEXT NOT NULL ,

	PRIMARY KEY (conceptId) ,
	FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Process_Concepts
(
	processId INTEGER UNSIGNED NOT NULL ,
	conceptId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (conceptId) REFERENCES Aux_Concepts(conceptId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Aux_Functions
(
	functionId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
	userId INTEGER UNSIGNED NOT NULL ,
	
	name CHAR(50) NOT NULL ,  
	description TEXT NOT NULL ,

	PRIMARY KEY (functionId) ,
	FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Process_Functions
(
	processId INTEGER UNSIGNED NOT NULL ,
	functionId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (functionId) REFERENCES Aux_Functions(functionId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE MacroActivity_Functions
(
    processId INTEGER UNSIGNED NOT NULL ,
	macroActivityId INTEGER UNSIGNED NOT NULL ,
	functionId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (macroActivityId) REFERENCES MacroActivities(macroActivityId) ON DELETE CASCADE ,
	FOREIGN KEY (functionId) REFERENCES Aux_Functions(functionId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE DetailedActivity_Functions
(
    processId INTEGER UNSIGNED NOT NULL ,
	detailedActivityId INTEGER UNSIGNED NOT NULL ,
	functionId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (detailedActivityId) REFERENCES DetailedActivities(detailedActivityId) ON DELETE CASCADE ,
	FOREIGN KEY (functionId) REFERENCES Aux_Functions(functionId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Aux_Verifications
(
	verificationId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
	userId INTEGER UNSIGNED NOT NULL ,
	
	name CHAR(50) NOT NULL ,  
	type ENUM ('revision', 'auditorship') NOT NULL,
	description TEXT NOT NULL ,
	frequency CHAR(50) NOT NULL ,
	worker CHAR(60) NOT NULL ,

	PRIMARY KEY (verificationId) ,
	FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Process_Verifications
(
	processId INTEGER UNSIGNED NOT NULL ,
	verificationId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (verificationId) REFERENCES Aux_Verifications(verificationId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Aux_Measurements
(
	measurementId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
	userId INTEGER UNSIGNED NOT NULL ,

	name CHAR(50) NOT NULL ,  
	description TEXT NOT NULL ,
	formula TEXT NOT NULL ,
	metric CHAR(50) NOT NULL ,
	
	PRIMARY KEY (measurementId) ,
	FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Process_Measurements
(
	processId INTEGER UNSIGNED NOT NULL ,
	measurementId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (measurementId) REFERENCES Aux_Measurements(measurementId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Aux_Trainings
(
	trainingId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
	userId INTEGER UNSIGNED NOT NULL ,

	name CHAR(50) NOT NULL ,  
	description TEXT NOT NULL ,
	public CHAR (100) NOT NULL ,
		
	PRIMARY KEY (trainingId) ,
	FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Process_Trainings
(
	processId INTEGER UNSIGNED NOT NULL ,
	trainingId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (trainingId) REFERENCES Aux_Trainings(trainingId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Aux_Methods
(
	methodId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
	userId INTEGER UNSIGNED NOT NULL ,

	name CHAR(50) NOT NULL ,  
	what TEXT NOT NULL ,
	why TEXT NOT NULL ,
	appliesWhen TEXT NOT NULL ,
	how TEXT NOT NULL ,
	restriction TEXT NOT NULL ,
	generatedProduct TEXT NOT NULL,
	reference TEXT NOT NULL,
			
	PRIMARY KEY (methodId) ,
	FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Process_Methods
(
	processId INTEGER UNSIGNED NOT NULL ,
	methodId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (methodId) REFERENCES Aux_Methods(methodId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE MacroActivity_Methods
(
    processId INTEGER UNSIGNED NOT NULL ,
	macroActivityId INTEGER UNSIGNED NOT NULL ,
	methodId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (macroActivityId) REFERENCES MacroActivities(macroActivityId) ON DELETE CASCADE ,
	FOREIGN KEY (methodId) REFERENCES Aux_Methods(methodId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE DetailedActivity_Methods
(
    processId INTEGER UNSIGNED NOT NULL ,
	detailedActivityId INTEGER UNSIGNED NOT NULL ,
	methodId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (detailedActivityId) REFERENCES DetailedActivities(detailedActivityId) ON DELETE CASCADE ,
	FOREIGN KEY (methodId) REFERENCES Aux_Methods(methodId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Aux_Tools
(
	toolId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
	userId INTEGER UNSIGNED NOT NULL ,

	name CHAR(50) NOT NULL ,  
	description TEXT NOT NULL ,	
		
	PRIMARY KEY (toolId) ,
	FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Process_Tools
(
	processId INTEGER UNSIGNED NOT NULL ,
	toolId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (toolId) REFERENCES Aux_Tools(toolId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE MacroActivity_Tools
(
    processId INTEGER UNSIGNED NOT NULL ,
	macroActivityId INTEGER UNSIGNED NOT NULL ,
	toolId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (macroActivityId) REFERENCES MacroActivities(macroActivityId) ON DELETE CASCADE ,
	FOREIGN KEY (toolId) REFERENCES Aux_Tools(toolId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE DetailedActivity_Tools
(
    processId INTEGER UNSIGNED NOT NULL ,
	detailedActivityId INTEGER UNSIGNED NOT NULL ,
	toolId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (detailedActivityId) REFERENCES DetailedActivities(detailedActivityId) ON DELETE CASCADE ,
	FOREIGN KEY (toolId) REFERENCES Aux_Tools(toolId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Aux_Forms
(
	formId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
	userId INTEGER UNSIGNED NOT NULL ,

	name CHAR(50) NOT NULL ,  
	purpose TEXT NOT NULL ,

	PRIMARY KEY (formId) ,
	FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Process_Forms
(
	processId INTEGER UNSIGNED NOT NULL ,
	formId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (formId) REFERENCES Aux_Forms(formId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Aux_Politics
(
	politicsId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
	userId INTEGER UNSIGNED NOT NULL ,

	name CHAR(50) NOT NULL ,  
	description TEXT NOT NULL ,	
		
	PRIMARY KEY (politicsId) ,
	FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Process_Politics
(
	processId INTEGER UNSIGNED NOT NULL ,
	politicsId INTEGER UNSIGNED NOT NULL ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (politicsId) REFERENCES Aux_Politics(politicsId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Aux_Artifacts
(
	artifactId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
	userId INTEGER UNSIGNED NOT NULL ,

	name CHAR(50) NOT NULL ,  
	description TEXT NOT NULL ,
			
	PRIMARY KEY (artifactId) ,
	FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE Process_Artifacts
(
	processId INTEGER UNSIGNED NOT NULL ,
	artifactId INTEGER UNSIGNED NOT NULL ,
	type ENUM ('input', 'output') ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (artifactId) REFERENCES Aux_Artifacts(artifactId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE MacroActivity_Artifacts
(
    processId INTEGER UNSIGNED NOT NULL ,
	macroActivityId INTEGER UNSIGNED NOT NULL ,
	artifactId INTEGER UNSIGNED NOT NULL ,
	type ENUM ('input', 'output') ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (macroActivityId) REFERENCES MacroActivities(macroActivityId) ON DELETE CASCADE ,
	FOREIGN KEY (artifactId) REFERENCES Aux_Artifacts(artifactId) ON DELETE CASCADE
) TYPE=INNODB;


CREATE TABLE DetailedActivity_Artifacts
(
    processId INTEGER UNSIGNED NOT NULL ,
	detailedActivityId INTEGER UNSIGNED NOT NULL ,
	artifactId INTEGER UNSIGNED NOT NULL ,
	type ENUM ('input', 'output') ,
	FOREIGN KEY (processId) REFERENCES Processes(processId) ON DELETE CASCADE ,
	FOREIGN KEY (detailedActivityId) REFERENCES DetailedActivities(detailedActivityId) ON DELETE CASCADE ,
	FOREIGN KEY (artifactId) REFERENCES Aux_Artifacts(artifactId) ON DELETE CASCADE
) TYPE=INNODB;

