var PMA_messages = new Array();
PMA_messages['strConfirm'] = "Confirmer";
PMA_messages['strDoYouReally'] = "Faut-il vraiment exécuter « %s » ?";
PMA_messages['strDropDatabaseStrongWarning'] = "Une base de données est sur le point d\'être DÉTRUITE !";
PMA_messages['strDatabaseRenameToSameName'] = "Impossible de donner le même nom à la base de données. Modifier le nom et réessayer";
PMA_messages['strDropTableStrongWarning'] = "Une table entière est sur le point d\'être DÉTRUITE !";
PMA_messages['strTruncateTableStrongWarning'] = "Une table entière est sur le point d\'être VIDÉE !";
PMA_messages['strDeleteTrackingData'] = "Faut-il supprimer les données de suivi pour cette table ?";
PMA_messages['strDeleteTrackingDataMultiple'] = "Faut-il supprimer les données de suivi pour ces tables ?";
PMA_messages['strDeleteTrackingVersion'] = "Faut-il supprimer les données de suivi pour cette version ?";
PMA_messages['strDeleteTrackingVersionMultiple'] = "Faut-il supprimer les données de suivi pour ces versions ?";
PMA_messages['strDeletingTrackingEntry'] = "Faut-il supprimer l\'entrée du rapport de suivi ?";
PMA_messages['strDeletingTrackingData'] = "Suppression des données de suivi";
PMA_messages['strDroppingPrimaryKeyIndex'] = "Destruction de clé primaire/index";
PMA_messages['strDroppingForeignKey'] = "Destruction de la clé étrangère.";
PMA_messages['strOperationTakesLongTime'] = "Cette opération pourrait être longue. Fquand même procéder ?";
PMA_messages['strDropUserGroupWarning'] = "Faut-il vraiment supprimer le groupe d\'utilisateurs « %s » ?";
PMA_messages['strConfirmDeleteQBESearch'] = "Faut-il vraiment supprimer la recherche « %s » ?";
PMA_messages['strConfirmNavigation'] = "Des modifications n\'ont pas été sauvegardées. Faut-il vraiment quitter cette page ?";
PMA_messages['strConfirmRowChange'] = "Le nombre de rangées va être réduit alors que des données ont déjà été saisies dans ces rangées qui seront perdues. Faut-il continuer ?";
PMA_messages['strDropUserWarning'] = "Faut-il vraiment supprimer l\'(es) utilisateur(s) sélectionné(s) ?";
PMA_messages['strDeleteCentralColumnWarning'] = "Faut-il vraiment supprimer cette colonne centrale ?";
PMA_messages['strDropRTEitems'] = "Faut-il vraiment supprimer les éléments sélectionnés ?";
PMA_messages['strDropPartitionWarning'] = "Faut-il vraiment supprimer (DROP) la(es) partition(s) sélectionnée(s) ? Cela va également SUPPRIMER les données associées à la(aux) partition(s) sélectionnée(s) !";
PMA_messages['strTruncatePartitionWarning'] = "Faut-il vraiment tronquer (TRUNCATE) la(es) partition(s) sélectionnée(s) ?";
PMA_messages['strRemovePartitioningWarning'] = "Faut-il vraiment retirer le partitionnement ?";
PMA_messages['strResetSlaveWarning'] = "Faut-il vraiment exécuter « RESET SLAVE » ?";
PMA_messages['strChangeColumnCollation'] = "Cette opération va tenter de convertir les données dans le nouveau classement. Dans de rares cas, en particulièrement quand un caractère n\'existe pas dans le nouveau classement, ce processus pourrait causer un mauvais affichage des données dans le nouveau classement ; dans ce cas il est suggéré de revenir au classement d\'origine et de consulter les astuces à <a href=\"%s\" target=\"garbled_data_wiki\">Données déformées</a>.<br/><br/>Faut-il vraiment modifier le classement et convertir les données ?";
PMA_messages['strChangeAllColumnCollationsWarning'] = "Par cette opération, MySQL tente de mapper les valeurs de données entre les classements. Si les jeux de caractères sont incompatibles, il peut y avoir une perte de données et les données perdues peuvent <b>NE PAS</b> être récupérables simplement en changeant la colonne de classement. <b>Pour convertir les données existantes, il est conseillé d\'utiliser le mode d\'édition de colonne (le lien « Modifier ») sur la page de structure de table.</b><br/><br/>Faut-il vraiment modifier tous les classements de colonnes et convertir les données ?";
PMA_messages['strSaveAndClose'] = "Sauvegarder et fermer";
PMA_messages['strReset'] = "Réinitialiser";
PMA_messages['strResetAll'] = "Tout réinitialiser";
PMA_messages['strFormEmpty'] = "Formulaire incomplet !";
PMA_messages['strRadioUnchecked'] = "Sélectionner au moins l\'une des options !";
PMA_messages['strEnterValidNumber'] = "Merci de saisir un nombre valide !";
PMA_messages['strEnterValidLength'] = "Merci de saisir une longueur valide !";
PMA_messages['strAddIndex'] = "Ajouter un index";
PMA_messages['strEditIndex'] = "Modifier un index";
PMA_messages['strAddToIndex'] = "Ajouter %s colonne(s) à l\'index";
PMA_messages['strCreateSingleColumnIndex'] = "Créer un index sur colonne unique";
PMA_messages['strCreateCompositeIndex'] = "Créer un index sur plusieurs colonnes";
PMA_messages['strCompositeWith'] = "Autres colonnes formant l\'index :";
PMA_messages['strMissingColumn'] = "Merci de sélectionner la(es) colonne(s) de l\'index.";
PMA_messages['strPreviewSQL'] = "Aperçu SQL";
PMA_messages['strSimulateDML'] = "Simuler la requête";
PMA_messages['strMatchedRows'] = "Lignes correspondantes :";
PMA_messages['strSQLQuery'] = "Requête SQL : ";
PMA_messages['strYValues'] = "Valeurs en Y";
PMA_messages['strHostEmpty'] = "Le nom d\'hôte est vide !";
PMA_messages['strUserEmpty'] = "Le nom d\'utilisateur est vide !";
PMA_messages['strPasswordEmpty'] = "Le mot de passe est vide !";
PMA_messages['strPasswordNotSame'] = "Les mots de passe doivent être identiques !";
PMA_messages['strRemovingSelectedUsers'] = "Effacement des utilisateurs sélectionnés";
PMA_messages['strClose'] = "Fermer";
PMA_messages['strTemplateCreated'] = "Le modèle a été créé.";
PMA_messages['strTemplateLoaded'] = "Le modèle a été chargé.";
PMA_messages['strTemplateUpdated'] = "Le modèle a été mis à  jour.";
PMA_messages['strTemplateDeleted'] = "Le modèle a été supprimé.";
PMA_messages['strOther'] = "Autres";
PMA_messages['strThousandsSeparator'] = " ";
PMA_messages['strDecimalSeparator'] = ",";
PMA_messages['strChartConnectionsTitle'] = "Connexions/Processus";
PMA_messages['strIncompatibleMonitorConfig'] = "La configuration locale de la surveillance est incompatible !";
PMA_messages['strIncompatibleMonitorConfigDescription'] = "La configuration de la disposition des graphiques dans le stockage local du navigateur n\'est plus compatible avec l\'interface de surveillance. La configuration courante ne fonctionnera probablement pas. Merci de réinitialiser la configuration via le menu <i>Paramètres</i>.";
PMA_messages['strQueryCacheEfficiency'] = "Efficacité du cache de requêtes";
PMA_messages['strQueryCacheUsage'] = "Utilisation du cache de requêtes";
PMA_messages['strQueryCacheUsed'] = "Cache de requêtes utilisé";
PMA_messages['strSystemCPUUsage'] = "Utilisation processeur";
PMA_messages['strSystemMemory'] = "Mémoire système";
PMA_messages['strSystemSwap'] = "Zone d\'échange système";
PMA_messages['strAverageLoad'] = "Charge moyenne";
PMA_messages['strTotalMemory'] = "Mémoire système";
PMA_messages['strCachedMemory'] = "Mémoire cache";
PMA_messages['strBufferedMemory'] = "Mémoire tampon";
PMA_messages['strFreeMemory'] = "Mémoire libre";
PMA_messages['strUsedMemory'] = "Mémoire utilisée";
PMA_messages['strTotalSwap'] = "Zone d\'échange totale";
PMA_messages['strCachedSwap'] = "Zone d\'échange en cache";
PMA_messages['strUsedSwap'] = "Zone d\'échange utilisée";
PMA_messages['strFreeSwap'] = "Zone d\'échange libre";
PMA_messages['strBytesSent'] = "Octets envoyés";
PMA_messages['strBytesReceived'] = "Octets reçus";
PMA_messages['strConnections'] = "Connexions";
PMA_messages['strProcesses'] = "Processus";
PMA_messages['strB'] = "o";
PMA_messages['strKiB'] = "kio";
PMA_messages['strMiB'] = "Mio";
PMA_messages['strGiB'] = "Gio";
PMA_messages['strTiB'] = "Tio";
PMA_messages['strPiB'] = "Pio";
PMA_messages['strEiB'] = "Eio";
PMA_messages['strNTables'] = "%d table(s)";
PMA_messages['strQuestions'] = "Nombre d\'instructions exécutées par le serveur";
PMA_messages['strTraffic'] = "Trafic";
PMA_messages['strSettings'] = "Paramètres";
PMA_messages['strAddChart'] = "Ajouter le graphique à la grille";
PMA_messages['strAddOneSeriesWarning'] = "Merci ajouter au moins une variable aux séries !";
PMA_messages['strNone'] = "Aucun(e)";
PMA_messages['strResumeMonitor'] = "Reprendre la surveillance";
PMA_messages['strPauseMonitor'] = "Mettre la surveillance en pause";
PMA_messages['strStartRefresh'] = "Lancer l\'actualisation automatique";
PMA_messages['strStopRefresh'] = "Arrêter l\'actualisation automatique";
PMA_messages['strBothLogOn'] = "general_log et slow_query_log sont activés.";
PMA_messages['strGenLogOn'] = "general_log est activé.";
PMA_messages['strSlowLogOn'] = "slow_query_log est activé.";
PMA_messages['strBothLogOff'] = "general_log et slow_query_log sont désactivés.";
PMA_messages['strLogOutNotTable'] = "log_output n\'est pas défini à TABLE.";
PMA_messages['strLogOutIsTable'] = "log_output est défini à TABLE.";
PMA_messages['strSmallerLongQueryTimeAdvice'] = "slow_query_log est activé, mais le serveur n\'enregistre que les requêtes qui prennent plus de %d secondes. Il est recommandé de régler long_query_time à 0-2 secondes, selon le système.";
PMA_messages['strLongQueryTimeSet'] = "long_query_time est défini à %d seconde(s).";
PMA_messages['strSettingsAppliedGlobal'] = "Les paramètres suivants seront appliqués globalement et remis à la valeur par défaut lors du redémarrage du serveur :";
PMA_messages['strSetLogOutput'] = "Définir log_output à %s";
PMA_messages['strEnableVar'] = "Activer %s";
PMA_messages['strDisableVar'] = "Désactiver %s";
PMA_messages['setSetLongQueryTime'] = "Définir long_query_time à %d secondes.";
PMA_messages['strNoSuperUser'] = "Il n\'est pas possible de modifier ces variables. Merci de se connecter en tant que root ou de contacter l\'administrateur du serveur.";
PMA_messages['strChangeSettings'] = "Modifier les paramètres";
PMA_messages['strCurrentSettings'] = "Paramètres actuels";
PMA_messages['strChartTitle'] = "Titre du graphique";
PMA_messages['strDifferential'] = "Différentiel";
PMA_messages['strDividedBy'] = "Divisé par %s";
PMA_messages['strUnit'] = "Unité";
PMA_messages['strFromSlowLog'] = "Depuis le journal des requêtes lentes";
PMA_messages['strFromGeneralLog'] = "Depuis le journal général";
PMA_messages['strServerLogError'] = "Le nom de la base de données est inconnu pour cette requête dans les journaux du serveur.";
PMA_messages['strAnalysingLogsTitle'] = "Analyse des journaux en cours";
PMA_messages['strAnalysingLogs'] = "Analyse et chargement des journaux en cours. Ceci peut prendre un certain temps.";
PMA_messages['strCancelRequest'] = "Annuler la requête";
PMA_messages['strCountColumnExplanation'] = "Cette colonne affiche le nombre de requêtes identiques qui sont regroupées. Cependant, seulement le texte SQL de la requête a été utilisé comme critère de regroupement, donc les autres propriétés des requêtes, comme l\'heure de début, peuvent différer.";
PMA_messages['strMoreCountColumnExplanation'] = "Comme le groupement des requêtes INSERT a été sélectionné, les requêtes INSERT dans une même table sont groupées, peu importe les données insérées.";
PMA_messages['strLogDataLoaded'] = "Fichier journal chargé. Requêtes exécutées dans ce laps de temps : ";
PMA_messages['strJumpToTable'] = "Aller à la table du journal";
PMA_messages['strNoDataFoundTitle'] = "Aucune donnée trouvée";
PMA_messages['strNoDataFound'] = "Journal analysé, mais aucune donnée trouvée dans ce laps de temps.";
PMA_messages['strAnalyzing'] = "Analyse en cours…";
PMA_messages['strExplainOutput'] = "Expliquer les résultats";
PMA_messages['strStatus'] = "État";
PMA_messages['strTime'] = "Temps";
PMA_messages['strTotalTime'] = "Durée totale :";
PMA_messages['strProfilingResults'] = "Profilage des résultats";
PMA_messages['strTable'] = "Table";
PMA_messages['strChart'] = "Graphique";
PMA_messages['strAliasDatabase'] = "Base de données";
PMA_messages['strAliasTable'] = "Table";
PMA_messages['strAliasColumn'] = "Colonne";
PMA_messages['strFiltersForLogTable'] = "Options de filtrage du journal de la table";
PMA_messages['strFilter'] = "Filtre";
PMA_messages['strFilterByWordRegexp'] = "Filtrer les requêtes par mot ou expression régulière : ";
PMA_messages['strIgnoreWhereAndGroup'] = "Grouper les requêtes en ignorant la partie variable des clauses WHERE";
PMA_messages['strSumRows'] = "Somme des lignes regroupées : ";
PMA_messages['strTotal'] = "Total : ";
PMA_messages['strLoadingLogs'] = "Chargement des journaux en cours";
PMA_messages['strRefreshFailed'] = "Échec de rafraîchissement de la surveillance";
PMA_messages['strInvalidResponseExplanation'] = "Le serveur a retourné une réponse invalide à la demande d\'un nouveau graphique de données. La session a probablement expiré. Merci de recharger la page et de se connecter à nouveau.";
PMA_messages['strReloadPage'] = "Recharger la page";
PMA_messages['strAffectedRows'] = "Lignes modifiées : ";
PMA_messages['strFailedParsingConfig'] = "Échec d\'analyse du fichier de configuration. Il ne contient pas de code JSON valide.";
PMA_messages['strFailedBuildingGrid'] = "Échec de construction de la grille de graphiques avec la configuration importée. Réinitialisation à la configuration par défaut…";
PMA_messages['strImport'] = "Importer";
PMA_messages['strImportDialogTitle'] = "Importer la configuration de surveillance";
PMA_messages['strImportDialogMessage'] = "Merci de choisir le fichier à importer.";
PMA_messages['strNoImportFile'] = "Aucun fichier disponible sur le serveur pour une importation !";
PMA_messages['strAnalyzeQuery'] = "Analyser la requête";
PMA_messages['strAdvisorSystem'] = "Conseiller";
PMA_messages['strPerformanceIssues'] = "Impact possible sur les performances";
PMA_messages['strIssuse'] = "Problème";
PMA_messages['strRecommendation'] = "Recommandation";
PMA_messages['strRuleDetails'] = "Détails de règle";
PMA_messages['strJustification'] = "Alignement";
PMA_messages['strFormula'] = "Variable/Formule utilisée";
PMA_messages['strTest'] = "Test";
PMA_messages['strFormatting'] = "Formatage SQL…";
PMA_messages['strNoParam'] = "Aucun paramètre trouvé !";
PMA_messages['strGo'] = "Exécuter";
PMA_messages['strCancel'] = "Annuler";
PMA_messages['strPageSettings'] = "Paramètres relatifs à la page";
PMA_messages['strApply'] = "Appliquer";
PMA_messages['strLoading'] = "Chargement en cours…";
PMA_messages['strAbortedRequest'] = "Requête abandonnée !";
PMA_messages['strProcessingRequest'] = "Traitement de la requête";
PMA_messages['strRequestFailed'] = "Échec de cette requête !";
PMA_messages['strErrorProcessingRequest'] = "Erreur dans le traitement de la requête";
PMA_messages['strErrorCode'] = "Code d\'erreur : %s";
PMA_messages['strErrorText'] = "Texte de l\'erreur : %s";
PMA_messages['strErrorConnection'] = "Il semble que la connexion au serveur aie été perdue. Merci de vérifier la connectivité réseau et l\'état du serveur.";
PMA_messages['strNoDatabasesSelected'] = "Aucune base de données n\'a été sélectionnée.";
PMA_messages['strNoAccountSelected'] = "Aucun compte sélectionné.";
PMA_messages['strDroppingColumn'] = "Suppression de la colonne";
PMA_messages['strAddingPrimaryKey'] = "Ajout de clé primaire";
PMA_messages['strOK'] = "OK";
PMA_messages['strDismiss'] = "Cliquer pour éliminer ce message";
PMA_messages['strRenamingDatabases'] = "Changement du nom de la base de données";
PMA_messages['strCopyingDatabase'] = "Copie de la base de données";
PMA_messages['strChangingCharset'] = "Changement du jeu de caractères";
PMA_messages['strNo'] = "Non";
PMA_messages['strForeignKeyCheck'] = "Activer la vérification des clés étrangères";
PMA_messages['strErrorRealRowCount'] = "Impossible d\'obtenir le nombre réel de lignes.";
PMA_messages['strSearching'] = "En recherche";
PMA_messages['strHideSearchResults'] = "Cacher les résultats de recherche";
PMA_messages['strShowSearchResults'] = "Afficher les résultats de recherche";
PMA_messages['strBrowsing'] = "Parcours en cours";
PMA_messages['strDeleting'] = "Suppression en cours";
PMA_messages['strConfirmDeleteResults'] = "Faut-il supprimer de la table %s les correspondances ?";
PMA_messages['MissingReturn'] = "La définition d\'une fonction stockée doit comporter une instruction RETURN !";
PMA_messages['strExport'] = "Exporter";
PMA_messages['NoExportable'] = "Aucune routine n’est exportable. Des privilèges requis pourraient manquer.";
PMA_messages['enum_editor'] = "Éditeur ENUM/SET";
PMA_messages['enum_columnVals'] = "Valeurs pour la colonne %s";
PMA_messages['enum_newColumnVals'] = "Valeurs pour une nouvelle colonne";
PMA_messages['enum_hint'] = "Saisir chaque valeur dans un champ séparé.";
PMA_messages['enum_addValue'] = "Ajouter %d valeur(s)";
PMA_messages['strImportCSV'] = "NB : si le fichier contient plusieurs tables, elles seront combinées en une seule.";
PMA_messages['strHideQueryBox'] = "Masquer la zone SQL";
PMA_messages['strShowQueryBox'] = "Afficher la zone SQL";
PMA_messages['strEdit'] = "Éditer";
PMA_messages['strDelete'] = "Supprimer";
PMA_messages['strNotValidRowNumber'] = "%d n\'est pas un numéro de ligne valide.";
PMA_messages['strBrowseForeignValues'] = "Parcourir les valeurs étrangères";
PMA_messages['strNoAutoSavedQuery'] = "Aucune requête sauvegardée automatiquement";
PMA_messages['strBookmarkVariable'] = "Variable %d :";
PMA_messages['pickColumn'] = "Choisir";
PMA_messages['pickColumnTitle'] = "Sélecteur de colonne";
PMA_messages['searchList'] = "Chercher dans cette liste";
PMA_messages['strEmptyCentralList'] = "Aucune colonne dans la liste centrale. S\'assurer que la liste de colonnes centrales pour la base de données %s comporte des colonnes qui ne sont pas présentes dans la table actuelle.";
PMA_messages['seeMore'] = "Plus";
PMA_messages['confirmTitle'] = "Faut-il confirmer ?";
PMA_messages['makeConsistentMessage'] = "Cette action peut changer certaines définitions de colonnes.<br/>Faut-il vraiment continuer ?";
PMA_messages['strContinue'] = "Continuer";
PMA_messages['strAddPrimaryKey'] = "Ajouter une clé primaire";
PMA_messages['strPrimaryKeyAdded'] = "Une clé primaire a été ajoutée.";
PMA_messages['strToNextStep'] = "Vers l\'étape suivante…";
PMA_messages['strFinishMsg'] = "La première étape de la normalisation est terminée pour la table « %s ».";
PMA_messages['strEndStep'] = "Fin de l\'étape";
PMA_messages['str2NFNormalization'] = "Deuxième étape de la normalisation (2FN)";
PMA_messages['strDone'] = "Fermer";
PMA_messages['strConfirmPd'] = "Confirmer les dépendances partielles";
PMA_messages['strSelectedPd'] = "Les dépendances partielles sélectionnées sont les suivantes :";
PMA_messages['strPdHintNote'] = "NB : a, b -> d, f implique que les valeurs des colonnes a et b combinées peuvent déterminer les valeurs des colonnes d et f.";
PMA_messages['strNoPdSelected'] = "Aucune dépendance partielle sélectionnée !";
PMA_messages['strBack'] = "Retour";
PMA_messages['strShowPossiblePd'] = "Afficher les dépendances partielles possibles en se basant sur les données de la table";
PMA_messages['strHidePd'] = "Masquer la liste des dépendances partielles";
PMA_messages['strWaitForPd'] = "Patience ! Cela peut prendre quelques secondes selon la taille des données et le nombre de colonnes de la table.";
PMA_messages['strStep'] = "Étape";
PMA_messages['strMoveRepeatingGroup'] = "<ol><b>Les actions suivantes seront effectuées :</b><li>Supprimer (DROP) les colonnes %s de la table %s</li><li>Créer la table suivante :</li>";
PMA_messages['strNewTablePlaceholder'] = "Enter new table name";
PMA_messages['strNewColumnPlaceholder'] = "Enter column name";
PMA_messages['str3NFNormalization'] = "Troisième étape de la normalisation (3FN)";
PMA_messages['strConfirmTd'] = "Confirmer les dépendances transitives";
PMA_messages['strSelectedTd'] = "Les dépendances sélectionnées sont les suivantes :";
PMA_messages['strNoTdSelected'] = "Aucune dépendance sélectionnée !";
PMA_messages['strSave'] = "Enregistrer";
PMA_messages['strHideSearchCriteria'] = "Masquer les critères de recherche";
PMA_messages['strShowSearchCriteria'] = "Afficher les critères de recherche";
PMA_messages['strRangeSearch'] = "Recherche en intervalle";
PMA_messages['strColumnMax'] = "Maximum pour la colonne :";
PMA_messages['strColumnMin'] = "Minimum pour la colonne :";
PMA_messages['strMinValue'] = "Valeur minimale :";
PMA_messages['strMaxValue'] = "Valeur maximale :";
PMA_messages['strHideFindNReplaceCriteria'] = "Masquer les critères de recherche et remplacement";
PMA_messages['strShowFindNReplaceCriteria'] = "Afficher les critères de recherche et remplacement";
PMA_messages['strDisplayHelp'] = "<ul><li>Chaque point représente une ligne de données.</li><li>Survoler un point affichera son libellé.</li><li>Pour zoomer, sélectionner une section avec la souris.</li><li>Cliquer le bouton « Réinitialiser le zoom » pour revenir à l\'état d\'origine.</li><li>Cliquer sur un point pour visualiser et possiblement éditer la ligne de données.</li><li>L\'image peut être redimensionnée en faisant glisser le coin inférieur droit.</li></ul>";
PMA_messages['strHelpTitle'] = "Zoom search instructions";
PMA_messages['strInputNull'] = "<strong>Sélectionner deux colonnes</strong>";
PMA_messages['strSameInputs'] = "<strong>Sélectionner deux colonnes différentes</strong>";
PMA_messages['strDataPointContent'] = "Données relatives à ce point";
PMA_messages['strIgnore'] = "Ignorer";
PMA_messages['strCopy'] = "Copier";
PMA_messages['strX'] = "X";
PMA_messages['strY'] = "Y";
PMA_messages['strPoint'] = "Point";
PMA_messages['strPointN'] = "Point %d";
PMA_messages['strLineString'] = "Ligne";
PMA_messages['strPolygon'] = "Polygone";
PMA_messages['strGeometry'] = "Géométrie";
PMA_messages['strInnerRing'] = "Anneau intérieur";
PMA_messages['strOuterRing'] = "Anneau extérieur";
PMA_messages['strAddPoint'] = "Ajouter un point";
PMA_messages['strAddInnerRing'] = "Ajouter un anneau intérieur";
PMA_messages['strYes'] = "Oui";
PMA_messages['strCopyEncryptionKey'] = "Faut-il copier la clé de chiffrement ?";
PMA_messages['strEncryptionKey'] = "Clé de chiffrement";
PMA_messages['strMysqlAllowedValuesTipTime'] = "MySQL accepte des valeurs non sélectionnables via le sélecteur ; saisir directement ces valeurs si besoin";
PMA_messages['strMysqlAllowedValuesTipDate'] = "MySQL accepte des valeurs non sélectionnables via le sélecteur de date ; saisir directement ces valeurs si besoin";
PMA_messages['strLockToolTip'] = "Indique que des modifications ont été apportées à cette page ; une confirmation sera demandée avant d\'abandonner ces modifications";
PMA_messages['strSelectReferencedKey'] = "Sélectionner la clé référencée";
PMA_messages['strSelectForeignKey'] = "Sélectionner la clé étrangère";
PMA_messages['strPleaseSelectPrimaryOrUniqueKey'] = "Merci de sélectionner la clé primaire ou une clé unique !";
PMA_messages['strChangeDisplay'] = "Choisir la colonne à afficher";
PMA_messages['strLeavingDesigner'] = "Les modifications de la disposition n\'ont pas été enregistrées. Elles seront perdues si elles ne sont pas enregistrées. Faut-il vraiment continuer ?";
PMA_messages['strQueryEmpty'] = "value/subQuery est vide";
PMA_messages['strAddTables'] = "Ajouter des tables depuis d\'autres bases de données";
PMA_messages['strPageName'] = "Nom de la page";
PMA_messages['strSavePage'] = "Enregistrer la page";
PMA_messages['strSavePageAs'] = "Enregistrer la page sous";
PMA_messages['strOpenPage'] = "Ouvrir la page";
PMA_messages['strDeletePage'] = "Supprimer la page";
PMA_messages['strUntitled'] = "Sans titre";
PMA_messages['strSelectPage'] = "Merci de sélectionner une page pour continuer";
PMA_messages['strEnterValidPageName'] = "Merci de saisir un nom de page valide";
PMA_messages['strLeavingPage'] = "Faut-il enregistrer les modifications dans la page en cours ?";
PMA_messages['strSuccessfulPageDelete'] = "La page a été correctement supprimée";
PMA_messages['strExportRelationalSchema'] = "Exporter un schéma relationnel";
PMA_messages['strModificationSaved'] = "Les modifications ont été enregistrées";
PMA_messages['strAddOption'] = "Ajouter une option pour la colonne « %s ».";
PMA_messages['strObjectsCreated'] = "%d objet(s) créé(s).";
PMA_messages['strSubmit'] = "Soumettre";
PMA_messages['strCellEditHint'] = "Appuyer sur la touche d\'échappement pour annuler l\'édition.";
PMA_messages['strSaveCellWarning'] = "Des données modifiées n\'ont pas encore été sauvées. Faut-il vraiment quitter cette page avant de les enregistrer ?";
PMA_messages['strColOrderHint'] = "Faire glisser pour réordonner.";
PMA_messages['strSortHint'] = "Cliquer pour trier les résultats sur cette colonne.";
PMA_messages['strMultiSortHint'] = "Maj+Clic pour ajouter cette colonne à la clause ORDER BY ou pour basculer ASC/DESC.<br />- Ctrl+Clic ou Alt+Clic (sur Mac : Maj+Option+Clic) pour enlever la colonne de la clause ORDER BY";
PMA_messages['strColMarkHint'] = "Cliquer pour marquer/retirer les marques.";
PMA_messages['strColNameCopyHint'] = "Double-cliquer pour copier le nom de la colonne.";
PMA_messages['strColVisibHint'] = "Cliquer sur la flèche<br />pour afficher/masquer la colonne.";
PMA_messages['strShowAllCol'] = "Tout afficher";
PMA_messages['strAlertNonUnique'] = "Cette table ne contient pas de colonne unique. Les grilles d\'édition, les cases à cocher ainsi que les liens Éditer, Copier et Supprimer pourraient ne plus fonctionner après l\'enregistrement.";
PMA_messages['strEnterValidHex'] = "Merci de saisir une chaîne en hexadécimal valide. Les caractères possibles sont 0-9, A-F.";
PMA_messages['strShowAllRowsWarning'] = "Faut-il vraiment afficher toutes les lignes ? Pour une grande table, cela pourrait faire planter le navigateur.";
PMA_messages['strOriginalLength'] = "Longueur d\'origine";
PMA_messages['dropImportMessageCancel'] = "annuler";
PMA_messages['dropImportMessageAborted'] = "Abandonnée(s)";
PMA_messages['dropImportMessageFailed'] = "Échec";
PMA_messages['dropImportMessageSuccess'] = "Succès";
PMA_messages['dropImportImportResultHeader'] = "État de l\'importation";
PMA_messages['dropImportDropFiles'] = "Déposer des fichiers ici";
PMA_messages['dropImportSelectDB'] = "Sélectionner d\'abord une base de données";
PMA_messages['print'] = "Imprimer";
PMA_messages['back'] = "Retour";
PMA_messages['strGridEditFeatureHint'] = "Il est aussi possible de modifier la plupart<br/>des valeurs en les double-cliquant.";
PMA_messages['strGoToLink'] = "Suivre le lien :";
PMA_messages['strColNameCopyTitle'] = "Copier le nom de la colonne.";
PMA_messages['strColNameCopyText'] = "Faire un clic-droit sur le nom de la colonne pour le copier vers le presse-papiers.";
PMA_messages['strGeneratePassword'] = "Générer un mot de passe&nbsp;";
PMA_messages['strGenerate'] = "Générer";
PMA_messages['strChangePassword'] = "Modifier le mot de passe";
PMA_messages['strMore'] = "Plus";
PMA_messages['strShowPanel'] = "Afficher le panneau";
PMA_messages['strHidePanel'] = "Masquer le panneau";
PMA_messages['strUnhideNavItem'] = "Afficher les éléments cachés de l\'arbre de navigation.";
PMA_messages['linkWithMain'] = "Relier au panneau principal";
PMA_messages['unlinkWithMain'] = "Supprimer la liaison au panneau principal";
PMA_messages['strInvalidPage'] = "La page demandée n\'existe pas dans l\'historique, elle peut avoir expiré.";
PMA_messages['strNewerVersion'] = "Une nouvelle version de phpMyAdmin est disponible et il faudrait songer à une mise à niveau. La version la plus récente est %s, publiée le %s.";
PMA_messages['strLatestAvailable'] = ", dernière version stable : ";
PMA_messages['strUpToDate'] = "à jour";
PMA_messages['strCreateView'] = "Créer une vue";
PMA_messages['strSendErrorReport'] = "Envoyer le rapport d\'erreurs";
PMA_messages['strSubmitErrorReport'] = "Soumettre un rapport d\'erreurs";
PMA_messages['strErrorOccurred'] = "Une erreur JavaScript fatale s\'est produite. Faut-il envoyer un rapport d\'erreurs ?";
PMA_messages['strChangeReportSettings'] = "Modifier les paramètres de rapport";
PMA_messages['strShowReportDetails'] = "Afficher les détails du rapport";
PMA_messages['strTimeOutError'] = "L\'exportation est incomplète en raison d\'une limite de temps d\'exécution trop basse au niveau PHP !";
PMA_messages['strTooManyInputs'] = "Attention : un formulaire sur cette page contient plus de %d champs. Lors de l\'envoi, certains des champs pourraient être ignorés, en raison de la configuration max_input_vars de PHP.";
PMA_messages['phpErrorsFound'] = "<div class=\"error\">Des erreurs ont été détectées sur le serveur !<br/>Merci de regarder au bas de cette fenêtre.<div><input id=\"pma_ignore_errors_popup\" type=\"submit\" value=\"Ignorer\" class=\"floatright message_errors_found\"><input id=\"pma_ignore_all_errors_popup\" type=\"submit\" value=\"Ignorer tout\" class=\"floatright message_errors_found\"></div></div>";
PMA_messages['phpErrorsBeingSubmitted'] = "<div class=\"error\">Des erreurs ont été détectées sur le serveur !<br/>Selon les paramètres, ils sont actuellement soumis, merci de patienter.<br/><img src=\"./themes/pmahomme/img/ajax_clock_small.gif\" width=\"16\" height=\"16\" alt=\"ajax clock\"/></div>";
PMA_messages['strConsoleRequeryConfirm'] = "Faut-il exécuter à nouveau cette requête ?";
PMA_messages['strConsoleDeleteBookmarkConfirm'] = "Faut-il vraiment supprimer ce signet ?";
PMA_messages['strConsoleDebugError'] = "Une erreur s\'est produite lors de l\'obtention des informations de débogage SQL.";
PMA_messages['strConsoleDebugSummary'] = "%s requêtes exécutées %s fois en %s secondes.";
PMA_messages['strConsoleDebugArgsSummary'] = "%s arguments passés";
PMA_messages['strConsoleDebugShowArgs'] = "Montrer les arguments";
PMA_messages['strConsoleDebugHideArgs'] = "Masquer les arguments";
PMA_messages['strConsoleDebugTimeTaken'] = "Temps écoulé :";
PMA_messages['strNoLocalStorage'] = "Un problème est survenu lors de l\'accès au stockage du navigateur ; certaines fonctionnalités peuvent ne pas fonctionner. Il est probable que le navigateur ne prenne pas en charge le stockage ou que le quota d\'espace ait été atteint. Dans Firefox, un stockage corrompu peut également causer ce problème, et vider les « Données de site Web hors connexion » peut aider. Dans Safari, ce problème est habituellement causé par l\'utilisation de la « Navigation en mode privé ».";
PMA_messages['strCopyTablesTo'] = "Copier les tables vers";
PMA_messages['strAddPrefix'] = "Ajouter un préfixe de table";
PMA_messages['strReplacePrefix'] = "Remplacer la table ayant le préfixe";
PMA_messages['strCopyPrefix'] = "Copier la table avec un préfixe";
PMA_messages['strExtrWeak'] = "Extrêmement faible";
PMA_messages['strVeryWeak'] = "Très faible";
PMA_messages['strWeak'] = "Faible";
PMA_messages['strGood'] = "Bon";
PMA_messages['strStrong'] = "Fort";
PMA_messages['strU2FTimeout'] = "Délai de l\'attente pour l\'activation de la clé de sécurité dépassé.";
PMA_messages['strU2FError'] = "Activation de la clé de sécurité échouée (%s).";
var themeCalendarImage = './themes/pmahomme/img/b_calendar.png';
var pmaThemeImage = './themes/pmahomme/img/';
var mysql_doc_template = './url.php?url=https%3A%2F%2Fdev.mysql.com%2Fdoc%2Frefman%2F5.5%2Fen%2F%25s.html';
var maxInputVars = 1000;
if ($.datepicker) {
$.datepicker.regional['']['closeText'] = "Fermer";
$.datepicker.regional['']['prevText'] = "Précédent";
$.datepicker.regional['']['nextText'] = "Suivant";
$.datepicker.regional['']['currentText'] = "Aujourd\'hui";
$.datepicker.regional['']['monthNames'] = ["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre",];
$.datepicker.regional['']['monthNamesShort'] = ["jan.","fév.","mars","avr.","mai","juin","juil.","août","sep.","oct.","nov.","déc.",];
$.datepicker.regional['']['dayNames'] = ["dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi",];
$.datepicker.regional['']['dayNamesShort'] = ["dim.","lun.","mar.","mer.","jeu.","ven.","sam.",];
$.datepicker.regional['']['dayNamesMin'] = ["di","lu","ma","me","me","ve","sa",];
$.datepicker.regional['']['weekHeader'] = "sem";
$.datepicker.regional['']['showMonthAfterYear'] = false;
$.datepicker.regional['']['yearSuffix'] = "";
$.extend($.datepicker._defaults, $.datepicker.regional['']);
} /* if ($.datepicker) */

if ($.timepicker) {
$.timepicker.regional['']['timeText'] = "Temps";
$.timepicker.regional['']['hourText'] = "heure";
$.timepicker.regional['']['minuteText'] = "minute";
$.timepicker.regional['']['secondText'] = "seconde";
$.extend($.timepicker._defaults, $.timepicker.regional['']);
} /* if ($.timepicker) */

function extendingValidatorMessages() {
$.extend($.validator.messages, {
required: "Ce champ est obligatoire", remote: "Merci de corriger ce champ", email: "Merci de saisir une adresse de courriel valide", url: "Merci de saisir une URL valide", date: "Merci de saisir une date valide", dateISO: "Merci de saisir une date valide (ISO)", number: "Merci de saisir un nombre valide", creditcard: "Merci de saisir un numéro de carte de crédit valide", digits: "Merci de saisir uniquement des chiffres", equalTo: "Merci de saisir la même valeur à nouveau", maxlength: $.validator.format("Merci de saisir au maximum {0} caractères"), minlength: $.validator.format("Merci de saisir au moins {0} caractères"), rangelength: $.validator.format("Merci de saisir une valeur d\'une longueur entre {0} et {1} caractères"), range: $.validator.format("Merci de saisir une valeur entre {0} et {1}"), max: $.validator.format("Merci de saisir une valeur inférieure ou égale à {0}"), min: $.validator.format("Merci de saisir une valeur supérieure ou égale à {0}"), validationFunctionForDateTime: $.validator.format("Merci de saisir saisir une date ou une heure valide"), validationFunctionForHex: $.validator.format("Merci de saisir saisir une valeur hexadécimale valide"), validationFunctionForFuns: $.validator.format("Erreur")
});
} /* if ($.validator) */