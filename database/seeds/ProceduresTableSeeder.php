<?php

use Illuminate\Database\Seeder;
use HUAC\Models\Procedure;

class ProceduresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Procedure::create([
            'name' => 'CURATIVO GRAU II C/ OU S/ DEBRIDAMENTO',
            'sus_code' => '0401010015'
        ]);

        Procedure::create([
            'name' => 'CURATIVO GRAU I C/ OU S/ DEBRIDAMENTO',
            'sus_code' => '0401010023'
        ]);

        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO',
            'sus_code' => '0401010031'
        ]);

        Procedure::create([
            'name' => 'ELETROCOAGULACAO DE LESAO CUTANEA ',
            'sus_code' => '0401010040'
        ]);

        Procedure::create([
            'name' => 'EXCISAO DE LESAO E/OU SUTURA DE FERIMENTO DA PELE ANEXOS E MUCOSA',
            'sus_code' => '0401010058'
        ]);

        Procedure::create([
            'name' => 'EXCISAO E/OU SUTURA SIMPLES DE PEQUENAS LESOES / FERIMENTOS DE PELE / ANEXOS E MUCOSA',
            'sus_code' => '0401010066'
        ]);

        Procedure::create([
            'name' => 'EXERESE DE TUMOR DE PELE E ANEXOS / CISTO SEBACEO / LIPOMA',
            'sus_code' => '0401010074'
        ]);

        Procedure::create([
            'name' => 'FRENECTOMIA',
            'sus_code' => '0401010082'
        ]);

        Procedure::create([
            'name' => 'FULGURACAO / CAUTERIZACAO QUIMICA DE LESOES CUTANEAS',
            'sus_code' => '0401010090'
        ]);

        Procedure::create([
            'name' => 'INCISAO E DRENAGEM DE ABSCESSO',
            'sus_code' => '0401010104'
        ]);

        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO SUBCUTANEO',
            'sus_code' => '0401010112'
        ]);

        Procedure::create([
            'name' => 'RETIRADA DE LESAO POR SHAVING ',
            'sus_code' => '0401010120'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULA DO PESCOCO (POR APROXIMACAO)',
            'sus_code' => '0401010139'
        ]);

        Procedure::create([
            'name' => 'ENXERTO COMPOSTO',
            'sus_code' => '0401020010'
        ]);

        Procedure::create([
            'name' => 'ENXERTO DERMO-EPIDERMICO ',
            'sus_code' => '0401020029'
        ]);

        Procedure::create([
            'name' => 'ENXERTO LIVRE DE PELE TOTAL',
            'sus_code' => '0401020037'
        ]);

        Procedure::create([
            'name' => 'EXCISAO E ENXERTO DE PELE (HEMANGIOMA, NEVUS OU TUMOR ) ',
            'sus_code' => '0401020045'
        ]);

        Procedure::create([
            'name' => 'EXCISAO E SUTURA DE LESAO NA PELE C/ PLASTICA EM Z OU ROTACAO DE RETALHO',
            'sus_code' => '0401020053'
        ]);

        Procedure::create([
            'name' => 'EXERESE DE CISTO BRANQUIAL',
            'sus_code' => '0401020061'
        ]);

        Procedure::create([
            'name' => 'EXERESE DE CISTO DERMOIDE',
            'sus_code' => '0401020070'
        ]);

        Procedure::create([
            'name' => 'EXERESE DE CISTO SACRO-COCCIGEO ',
            'sus_code' => '0401020088'
        ]);

        Procedure::create([
            'name' => 'EXERESE DE CISTO TIREOGLOSSO',
            'sus_code' => '0401020096'
        ]);

        Procedure::create([
            'name' => 'EXTIRPACAO E SUPRESSAO DE LESAO DE PELE E DE TECIDO CELULAR SUBCUTANEO',
            'sus_code' => '0401020100'
        ]);

        Procedure::create([
            'name' => 'HOMOENXERTIA (ATO CIRURGICO PRE E POS-OPERATORIO)',
            'sus_code' => '0401020118'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE ESCALPO PARCIAL',
            'sus_code' => '0401020126'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE ESCALPO TOTAL',
            'sus_code' => '0401020134'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE HIPERCERATOSE PLANTAR (C/ CORRECAO PLASTICA)',
            'sus_code' => '0401020142'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DO SINUS PRE-AURICULAR',
            'sus_code' => '0401020150'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO EM ESTAGIOS SUBSEQUENTES DE ENXERTIA',
            'sus_code' => '0401020169'
        ]);

        Procedure::create([
            'name' => 'CIRURGIA DE UNHA (CANTOPLASTIA) ',
            'sus_code' => '0401020177'
        ]);

        Procedure::create([
            'name' => 'EXTIRPACAO DE BOCIO INTRATORACICO POR VIA TRANSESTERNAL ',
            'sus_code' => '0402010019'
        ]);

        Procedure::create([
            'name' => 'PARATIREOIDECTOMIA',
            'sus_code' => '0402010027'
        ]);

        Procedure::create([
            'name' => 'TIREOIDECTOMIA PARCIAL',
            'sus_code' => '0402010035'
        ]);

        Procedure::create([
            'name' => 'TIREOIDECTOMIA TOTAL',
            'sus_code' => '0402010043'
        ]);

        Procedure::create([
            'name' => 'TIREOIDECTOMIA TOTAL C/ ESVAZIAMENTO GANGLIONAR',
            'sus_code' => '0402010051'
        ]);

        Procedure::create([
            'name' => 'SUPRARRENALECTOMIA BILATERAL',
            'sus_code' => '0402020014'
        ]);

        Procedure::create([
            'name' => 'SUPRARRENALECTOMIA UNILATERAL ',
            'sus_code' => '0402020022'
        ]);

        Procedure::create([
            'name' => 'CRANIOPLASTIA',
            'sus_code' => '0403010012'
        ]);

        Procedure::create([
            'name' => 'CRANIOTOMIA DESCOMPRESSIVA',
            'sus_code' => '0403010020'
        ]);

        Procedure::create([
            'name' => 'CRANIOTOMIA DESCOMPRESSIVA DA FOSSA POSTERIOR',
            'sus_code' => '0403010039'
        ]);

        Procedure::create([
            'name' => 'CRANIOTOMIA PARA RETIRADA DE CISTO / ABSCESSO / GRANULOMA ENCEFALICO',
            'sus_code' => '0403010047'
        ]);

        Procedure::create([
            'name' => 'CRANIOTOMIA PARA RETIRADA DE CISTO / ABSCESSO / GRANULOMA ENCEFALICO (C/ TECNICA COMPLEMENTAR)',
            'sus_code' => '0403010055'
        ]);

        Procedure::create([
            'name' => 'CRANIOTOMIA PARA RETIRADA DE CORPO ESTRANHO INTRACRANIANO',
            'sus_code' => '0403010063'
        ]);

        Procedure::create([
            'name' => 'CRANIOTOMIA PARA RETIRADA DE CORPO ESTRANHO INTRACRANIANO (COM TECNICA COMPLEMENTAR)',
            'sus_code' => '0403010071'
        ]);

        Procedure::create([
            'name' => 'DERIVACAO RAQUE-PERITONEAL',
            'sus_code' => '0403010080'
        ]);

        Procedure::create([
            'name' => 'DERIVACAO VENTRICULAR EXTERNAR-SUBGALEAL EXTERNA',
            'sus_code' => '0403010098'
        ]);

        Procedure::create([
            'name' => 'DERIVACAO VENTRICULAR PARA PERITONEO / ATRIO / PLEURA / RAQUE',
            'sus_code' => '0403010101'
        ]);

        Procedure::create([
            'name' => 'DESCOMPRESSAO DE ORBITA POR DOENÇA OU TRAUMA',
            'sus_code' => '0403010110'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA CEREBRAL ENDOSCOPICA',
            'sus_code' => '0403010128'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA DA SIRINGOMIELIA',
            'sus_code' => '0403010136'
        ]);

        Procedure::create([
            'name' => 'RECONSTRUCAO CRANIANA / CRANIO-FACIAL',
            'sus_code' => '0403010144'
        ]);

        Procedure::create([
            'name' => 'RESSECÇÃO DE MUCOCELE FRONTAL ',
            'sus_code' => '0403010152'
        ]);

        Procedure::create([
            'name' => 'RETIRADA DE DERIVACAO VENTRICULAR PARA PERITONEO / ATRIO / PLEURA / RAQUE',
            'sus_code' => '0403010160'
        ]);

        Procedure::create([
            'name' => 'RETIRADA DE PLACA DE CRANIOPLASTIA',
            'sus_code' => '0403010179'
        ]);

        Procedure::create([
            'name' => 'REVISAO DE DERIVACAO VENTRICULAR PARA PERITONEO / ATRIO / PLEURA / RAQUE',
            'sus_code' => '0403010187'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE ABSCESSO INTRACRANIANO',
            'sus_code' => '0403010195'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE CRANIOSSINOSTOSE COM SUTURA UNICA',
            'sus_code' => '0403010209'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE CRANIOSSINOSTOSE COMPLEXA',
            'sus_code' => '0403010217'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE DISRAFISMO ABERTO',
            'sus_code' => '0403010225'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE DISRAFISMO OCULTO',
            'sus_code' => '0403010233'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULA LIQUORICA CRANIANA',
            'sus_code' => '0403010241'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULA LIQUORICA RAQUIDIANA',
            'sus_code' => '0403010250'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FRATURA DO CRANIO COM AFUNDAMENTO',
            'sus_code' => '0403010268'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE HEMATOMA EXTRADURAL',
            'sus_code' => '0403010276'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE HEMATOMA INTRACEREBRAL',
            'sus_code' => '0403010284'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE HEMATOMA INTRACEREBRAL (COM TECNICA COMPLEMENTAR)',
            'sus_code' => '0403010292'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE HEMATOMA SUBDURAL AGUDO',
            'sus_code' => '0403010306'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE HEMATOMA SUBDURAL CRONICO',
            'sus_code' => '0403010314'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE OSTEOMIELITE DO CRÂNIO',
            'sus_code' => '0403010322'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE PLATIBASIA E MALFORMACAO DE ARNOLD CHIARI',
            'sus_code' => '0403010330'
        ]);

        Procedure::create([
            'name' => 'TREPANACAO CRANIANA PARA PROPEDEUTICA NEUROCIRURGICA / IMPLANTE PARA MONITORIZACAO PIC',
            'sus_code' => '0403010349'
        ]);

        Procedure::create([
            'name' => 'TREPANACAO CRANIANA PARA PROPEDEUTICA OU TERAPEUTICA NEUROCIRURGICA (COM TECNICA COMPLEMENTAR)',
            'sus_code' => '0403010357'
        ]);

        Procedure::create([
            'name' => 'TREPANACAO CRANIANA PARA PROPEDEUTICA OU TERAPEUTICA NEUROCIRURGICA',
            'sus_code' => '0403010365'
        ]);

        Procedure::create([
            'name' => 'DRENAGEM LIQUÓRICA LOMBAR EXTERNA ',
            'sus_code' => '0403010390'
        ]);

        Procedure::create([
            'name' => 'ENXERTO MICROCIRURGICO DE NERVO PERIFERICO (2 OU MAIS NERVOS)',
            'sus_code' => '0403020018'
        ]);

        Procedure::create([
            'name' => 'ENXERTO MICROCIRURGICO DE NERVO PERIFERICO (ÚNICO NERVO)',
            'sus_code' => '0403020026'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA DE PLEXO BRAQUIAL COM EXPLORAÇÃO E NEUROLISE',
            'sus_code' => '0403020034'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA DE PLEXO BRAQUIAL COM MICROENXERTIA',
            'sus_code' => '0403020042'
        ]);

        Procedure::create([
            'name' => 'MICRONEUROLISE DE NERVO PERIFERICO',
            'sus_code' => '0403020050'
        ]);

        Procedure::create([
            'name' => 'MICRONEURORRAFIA',
            'sus_code' => '0403020069'
        ]);

        Procedure::create([
            'name' => 'NEUROLISE NAO FUNCIONAL DE NERVOS PERIFERICOS',
            'sus_code' => '0403020077'
        ]);

        Procedure::create([
            'name' => 'NEURORRAFIA',
            'sus_code' => '0403020085'
        ]);

        Procedure::create([
            'name' => 'NEUROTOMIA SELETIVA DE TRIGEMEO E OUTROS NERVOS CRANIANOS',
            'sus_code' => '0403020093'
        ]);

        Procedure::create([
            'name' => 'TRANSPOSICAO DO NERVO CUBITAL ',
            'sus_code' => '0403020107'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE NEUROPATIA COMPRESSIVA COM OU SEM MICROCIRURGIA ',
            'sus_code' => '0403020115'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE SINDROME COMPRESSIVA EM TUNEL OSTEO-FIBROSO AO NIVEL DO CARPO',
            'sus_code' => '0403020123'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO MICROCIRURGICO DE TUMOR DE NERVO PERIFERICO / NEUROMA',
            'sus_code' => '0403020131'
        ]);

        Procedure::create([
            'name' => 'CRANIOTOMIA PARA BIOPSIA ENCEFALICA',
            'sus_code' => '0403030013'
        ]);

        Procedure::create([
            'name' => 'CRANIOTOMIA PARA BIOPSIA ENCEFALICA (COM TÉCNICA COMPLEMENTAR)',
            'sus_code' => '0403030021'
        ]);

        Procedure::create([
            'name' => 'CRANIOTOMIA PARA RETIRADA DE TUMOR CEREBRAL INCLUSIVO DA FOSSA POSTERIOR',
            'sus_code' => '0403030030'
        ]);

        Procedure::create([
            'name' => 'CRANIOTOMIA PARA RETIRADA DE TUMOR INTRACRANIANO',
            'sus_code' => '0403030048'
        ]);

        Procedure::create([
            'name' => 'CRANIECTOMIA POR TUMOR OSSEO',
            'sus_code' => '0403030056'
        ]);

        Procedure::create([
            'name' => 'HIPOFISECTOMIA TRANSESFENOIDAL POR TECNICA COMPLEMENTAR ',
            'sus_code' => '0403030064'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA DE TUMOR INTRADURAL E EXTRAMEDULAR',
            'sus_code' => '0403030080'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA DE TUMOR MEDULAR COM TECNICA COMPLEMENTAR ',
            'sus_code' => '0403030099'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA DE TUMOR MEDULAR',
            'sus_code' => '0403030102'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA BIOPSIA DE MEDULA ESPINHAL OU RAIZES ',
            'sus_code' => '0403030110'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA TUMOR DA BASE DO CRANIO',
            'sus_code' => '0403030129'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA TUMOR DE ORBITA',
            'sus_code' => '0403030137'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA TUMOR INTRACRANIANO',
            'sus_code' => '0403030145'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA TUMOR INTRACRANIANO (COM TECNICA COMPLEMENTAR)',
            'sus_code' => '0403030153'
        ]);

        Procedure::create([
            'name' => 'RESSECÇÃO DE TUMOR RAQUIMEDULAR EXTRADURAL',
            'sus_code' => '0403030161'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CONSERVADOR DE TUMOR DO SISTEMA NERVOSO CENTRAL',
            'sus_code' => '0403030170'
        ]);

        Procedure::create([
            'name' => 'ANASTOMOSE VASCULAR EXTRA / INTRACRANIANA',
            'sus_code' => '0403040019'
        ]);

        Procedure::create([
            'name' => 'DESCOMPRESSAO NEUROVASCULAR DE NERVOS CRANIANOS',
            'sus_code' => '0403040027'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA MALFORMACAO ARTERIO-VENOSA CEREBRAL',
            'sus_code' => '0403040051'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA MALFORMAÇÃO ARTERIO-VENOSA CEREBRAL PROFUNDA',
            'sus_code' => '0403040060'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA VASCULAR INTRACRANIANA (COM TÉCNICA COMPLEMENTAR)',
            'sus_code' => '0403040078'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULA CAROTIDEO-CAVERNOSA',
            'sus_code' => '0403040086'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA ANEURISMA DA CIRCULAÇÃO CEREBRAL ANTERIOR MAIOR QUE 1,5 CM',
            'sus_code' => '0403040094'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA ANEURISMA DA CIRCULAÇÃO CEREBRAL POSTERIOR (MAIOR QUE 1,5 CM) ',
            'sus_code' => '0403040108'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA P/ARA ANEURISMA DA CIRCULAÇÃO CEREBRAL ANTERIOR MENOR QUE 1,5 CM ',
            'sus_code' => '0403040116'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA ANEURISMA DA CIRCULAÇÃO CEREBRAL POSTERIOR MENOR QUE 1,5 CM ',
            'sus_code' => '0403040124'
        ]);

        Procedure::create([
            'name' => 'ALCOOLIZAÇÃO DE NERVO CRANIANO',
            'sus_code' => '0403050014'
        ]);

        Procedure::create([
            'name' => 'ALCOOLIZACAO DE TRIGEMIO ',
            'sus_code' => '0403050022'
        ]);

        Procedure::create([
            'name' => 'BLOQUEIOS PROLONGADOS DE SISTEMA NERVOSO PERIFERICO / CENTRAL COM BOMBA DE INFUSAO',
            'sus_code' => '0403050030'
        ]);

        Procedure::create([
            'name' => 'CORDOTOMIA / MIELOTOMIA POR RADIOFREQUENCIA',
            'sus_code' => '0403050049'
        ]);

        Procedure::create([
            'name' => 'IMPLANTE INTRATECAL DE BOMBA DE INFUSAO DE FARMACOS',
            'sus_code' => '0403050057'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA COM CORDOTOMIA / MIELOTOMIA A CEU ABERTO',
            'sus_code' => '0403050065'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA COM RIZOTOMIA A CEU ABERTO',
            'sus_code' => '0403050073'
        ]);

        Procedure::create([
            'name' => 'NEUROTOMIA PERCUTANEA DE NERVOS PERIFERICOS POR AGENTES QUIMICOS',
            'sus_code' => '0403050081'
        ]);

        Procedure::create([
            'name' => 'RIZOTOMIA PERCUTANEA COM BALÃO',
            'sus_code' => '0403050090'
        ]);

        Procedure::create([
            'name' => 'RIZOTOMIA PERCUTANEA POR RADIOFREQUENCIA',
            'sus_code' => '0403050103'
        ]);

        Procedure::create([
            'name' => 'SIMPATECTOMIA LOMBAR A CEU ABERTO ',
            'sus_code' => '0403050111'
        ]);

        Procedure::create([
            'name' => 'SIMPATECTOMIA LOMBAR VIDEOCIRURGICA',
            'sus_code' => '0403050120'
        ]);

        Procedure::create([
            'name' => 'SIMPATECTOMIA TORACICA A CEU ABERTO',
            'sus_code' => '0403050138'
        ]);

        Procedure::create([
            'name' => 'SIMPATECTOMIA TORACICA VIDEOCIRURGICA',
            'sus_code' => '0403050146'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO DE LESAO DO SISTEMA NEUROVEGETATIVO POR AGENTES QUIMICOS',
            'sus_code' => '0403050154'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO POR ESTERETAXIA DE LESÃO DE ESTRUTURA PROFUNDA DE SNC PARA TRATATAMENTO DE MOVIMENTOS ANORMAIS OU CONTROLE DA DOR',
            'sus_code' => '0403050162'
        ]);

        Procedure::create([
            'name' => 'EXPLORAÇÃO DIAGNÓSTICA CIRURGICA PARA IMPLANTAÇÃO BILATERAL DE ELETRODOS INVASIVOS (INCLUI VIDEO-ELETROENCEFALOGRAMA)',
            'sus_code' => '0403060010'
        ]);

        Procedure::create([
            'name' => 'EXPLORAÇÃO DIAGNÓSTICA CIRURGICA PARA IMPLANTAÇÃO UNILATERAL DE ELETRODOS INVASIVOS (INCLUI VIDEO-ELETROENCEFALOGRAMA) ',
            'sus_code' => '0403060028'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA LESIONECTOMIA COM MONITORAMENTO INTRAOPERATORIO',
            'sus_code' => '0403060036'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA LESIONECTOMIA SEM MONITORAMENTO INTRA-OPERATORIO',
            'sus_code' => '0403060044'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA LOBECTOMIA TEMPORAL / AMIGDALO-HIPOCAMPECTOMIA SELETIVA',
            'sus_code' => '0403060052'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA RESSECCAO MULTILOBAR / HEMISFERECTOMIA / CALOSOTOMIA ',
            'sus_code' => '0403060060'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA RESSECÇÃO UNILOBAR EXTRATEMPORAL COM MONITORAMENTO INTRAOPERATORIO',
            'sus_code' => '0403060079'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA PARA RESSECCAO UNILOBAR EXTRATEMPORAL SEM MONITORAMENTO INTRA-OPERATORIO',
            'sus_code' => '0403060087'
        ]);

        Procedure::create([
            'name' => 'TRANSECÇÕES SUB-PIAIS MULTIPLAS EM AREAS ELOQUENTES',
            'sus_code' => '0403060095'
        ]);

        Procedure::create([
            'name' => 'ANGIOPLASTIA INTRACRANIANA EM VASO-ESPASMO',
            'sus_code' => '0403070015'
        ]);

        Procedure::create([
            'name' => 'EMBOLIZAÇÃO DE ANEURISMA CEREBRAL MAIOR QUE 1,5 CM COM COLO ESTREITO',
            'sus_code' => '0403070040'
        ]);

        Procedure::create([
            'name' => 'EMBOLIZAÇÃO DE ANEURISMA CEREBRAL MAIOR QUE 1,5 CM COM COLO LARGO',
            'sus_code' => '0403070058'
        ]);

        Procedure::create([
            'name' => 'EMBOLIZAÇÃO DE FISTULA ARTERIO-VENOSA DA CABEÇA E PESCOÇO',
            'sus_code' => '0403070082'
        ]);

        Procedure::create([
            'name' => 'EMBOLIZAÇÃO DE FISTULA CAROTIDO-CAVERNOSA COM BALÕES DESTACÁVEIS',
            'sus_code' => '0403070090'
        ]);

        Procedure::create([
            'name' => 'EMBOLIZAÇÃO DE MALFORMAÇÃO ARTERIO-VENOSA DURAL COMPLEXA DO SISTEMA NERVOSO CENTRAL',
            'sus_code' => '0403070104'
        ]);

        Procedure::create([
            'name' => 'EMBOLIZAÇÃO DE MALFORMAÇÃO ARTERIO-VENOSA DURAL SIMPLES DO SISTEMA NERVOSO CENTRAL',
            'sus_code' => '0403070112'
        ]);

        Procedure::create([
            'name' => 'EMBOLIZAÇÃO DE MALFORMAÇÃO ARTERIO-VENOSA INTRAPARENQUIMATOSA DO SISTEMA NERVOSO CENTRAL',
            'sus_code' => '0403070120'
        ]);

        Procedure::create([
            'name' => 'EMBOLIZAÇÃO DE TUMOR INTRA-CRANIANO OU DA CABEÇA E PESCOÇO',
            'sus_code' => '0403070139'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO DE ANEURISMA GIGANTE POR OCLUSÃO DO VASO PORTADOR',
            'sus_code' => '0403070147'
        ]);

        Procedure::create([
            'name' => 'EMBOLIZAÇÃO DE ANEURISMA CEREBRAL MENOR QUE 1,5 CM COM COLO ESTREITO',
            'sus_code' => '0403070155'
        ]);

        Procedure::create([
            'name' => 'EMBOLIZAÇÃO DE ANEURISMA CEREBRAL MENOR DO QUE 1,5 CM COM COLO LARGO',
            'sus_code' => '0403070163'
        ]);

        Procedure::create([
            'name' => 'IMPLANTE DE ELETRODO PARA ESTIMULAÇÃO CEREBRAL',
            'sus_code' => '0403080010'
        ]);

        Procedure::create([
            'name' => 'IMPLANTE DE GERADOR DE PULSOS P/ARA ESTIMULAÇÃO CEREBRAL (INCLUI CONECTOR)',
            'sus_code' => '0403080029'
        ]);

        Procedure::create([
            'name' => 'IMPLANTE INTRAVENTRICULAR DE BOMBA DE INFUSÃO DE FARMACOS',
            'sus_code' => '0403080037'
        ]);

        Procedure::create([
            'name' => 'MIECTOMIA SUPERSELETIVA',
            'sus_code' => '0403080045'
        ]);

        Procedure::create([
            'name' => 'NEUROTOMIA SUPERSELETIVA PARA MOVIMENTOS ANORMAIS',
            'sus_code' => '0403080053'
        ]);

        Procedure::create([
            'name' => 'NUCLEOTRACTOMIA TRIGEMINAL E/OU ESPINAL',
            'sus_code' => '0403080061'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO DE DOR POR ESTEREOTAXIA',
            'sus_code' => '0403080070'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO DE MOVIMENTO ANORMAL POR ESTEREOTAXIA',
            'sus_code' => '0403080088'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO DE MOVIMENTO ANORMAL POR ESTEREOTAXIA COM MICRO-REGISTRO',
            'sus_code' => '0403080096'
        ]);

        Procedure::create([
            'name' => 'TROCA DE GERADOR DE PULSOS PARA ESTIMULAÇÃO CEREBRAL',
            'sus_code' => '0403080100'
        ]);

        Procedure::create([
            'name' => 'ADENOIDECTOMIA',
            'sus_code' => '0404010016'
        ]);

        Procedure::create([
            'name' => 'AMIGDALECTOMIA',
            'sus_code' => '0404010024'
        ]);

        Procedure::create([
            'name' => 'AMIGDALECTOMIA C/ ADENOIDECTOMIA',
            'sus_code' => '0404010032'
        ]);

        Procedure::create([
            'name' => 'ANTROTOMIA DA MASTOIDE (DRENAGEM DE OTITE NO LACTENTE)',
            'sus_code' => '0404010040'
        ]);

        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO FARINGEO ',
            'sus_code' => '0404010059'
        ]);

        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO PERIAMIGDALIANO',
            'sus_code' => '0404010067'
        ]);

        Procedure::create([
            'name' => 'DRENAGEM DE FURUNCULO NO CONDUTO AUDITIVO EXTERNO',
            'sus_code' => '0404010075'
        ]);

        Procedure::create([
            'name' => 'DRENAGEM DO SACO ENDO-LINFATICO - SHUNT (C/ AUDICAO POR VIA TRANSMASTOIDEA)',
            'sus_code' => '0404010083'
        ]);

        Procedure::create([
            'name' => 'DUCHA DE POLITZER (UNI / BILATERAL)',
            'sus_code' => '0404010091'
        ]);

        Procedure::create([
            'name' => 'ESTAPEDECTOMIA',
            'sus_code' => '0404010105'
        ]);

        Procedure::create([
            'name' => 'EXERESE DE PAPILOMA EM LARINGE',
            'sus_code' => '0404010113'
        ]);

        Procedure::create([
            'name' => 'EXERESE DE TUMOR DE VIAS AEREAS SUPERIORES, FACE E PESCOCO',
            'sus_code' => '0404010121'
        ]);

        Procedure::create([
            'name' => 'EXTIRPACAO DE TUMOR DO CAVUM E FARINGE',
            'sus_code' => '0404010130'
        ]);

        Procedure::create([
            'name' => 'IMPLANTE COCLEAR',
            'sus_code' => '0404010148'
        ]);

        Procedure::create([
            'name' => 'INFILTRACAO MEDICAMENTOSA EM CORNETO INFERIOR',
            'sus_code' => '0404010156'
        ]);

        Procedure::create([
            'name' => 'LABIRINTECTOMIA MEMBRANOSA / OSSEA COM OU S/ AUDICAO',
            'sus_code' => '0404010164'
        ]);

        Procedure::create([
            'name' => 'LARINGECTOMIA PARCIAL',
            'sus_code' => '0404010172'
        ]);

        Procedure::create([
            'name' => 'LARINGECTOMIA TOTAL',
            'sus_code' => '0404010180'
        ]);

        Procedure::create([
            'name' => 'LARINGECTOMIA TOTAL C/ ESVAZIAMENTO CERVICAL',
            'sus_code' => '0404010199'
        ]);

        Procedure::create([
            'name' => 'LARINGORRAFIA',
            'sus_code' => '0404010202'
        ]);

        Procedure::create([
            'name' => 'MASTOIDECTOMIA RADICAL',
            'sus_code' => '0404010210'
        ]);

        Procedure::create([
            'name' => 'MASTOIDECTOMIA SUBTOTAL',
            'sus_code' => '0404010229'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA OTOLOGICA',
            'sus_code' => '0404010237'
        ]);

        Procedure::create([
            'name' => 'MIRINGOTOMIA',
            'sus_code' => '0404010245'
        ]);

        Procedure::create([
            'name' => 'PARACENTESE DO TIMPANO',
            'sus_code' => '0404010253'
        ]);

        Procedure::create([
            'name' => 'PUNCAO TRANSMEATICA DO SEIO MAXILAR (UNILATERAL)',
            'sus_code' => '0404010261'
        ]);

        Procedure::create([
            'name' => 'REMOCAO DE CERUMEN DE CONDUTO AUDITIVO EXTERNO UNI / BILATERAL',
            'sus_code' => '0404010270'
        ]);

        Procedure::create([
            'name' => 'RESSECCAO DE GLOMO TIMPANICO',
            'sus_code' => '0404010288'
        ]);

        Procedure::create([
            'name' => 'RESSECCAO DE SINEQUIAS',
            'sus_code' => '0404010296'
        ]);

        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO DA CAVIDADE AUDITIVA E NASAL ',
            'sus_code' => '0404010300'
        ]);

        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO DE OUVIDO / FARINGE / LARINGE / NARIZ',
            'sus_code' => '0404010318'
        ]);

        Procedure::create([
            'name' => 'SINUSOTOMIA BILATERAL',
            'sus_code' => '0404010326'
        ]);

        Procedure::create([
            'name' => 'SINUSOTOMIA ESFENOIDAL',
            'sus_code' => '0404010334'
        ]);

        Procedure::create([
            'name' => 'TAMPONAMENTO NASAL ANTERIOR E/OU POSTERIOR',
            'sus_code' => '0404010342'
        ]);

        Procedure::create([
            'name' => 'TIMPANOPLASTIA (UNI / BILATERAL)',
            'sus_code' => '0404010350'
        ]);

        Procedure::create([
            'name' => 'TIMPANOTOMIA P/ TUBO DE VENTILACAO',
            'sus_code' => '0404010369'
        ]);

        Procedure::create([
            'name' => 'TRAQUEOSTOMIA',
            'sus_code' => '0404010377'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE ESTENOSE DO CONDUTO AUDITIVO',
            'sus_code' => '0404010385'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE PERICONDRITE DE PAVILHAO',
            'sus_code' => '0404010393'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE RINITE CRONICA (OZENA)',
            'sus_code' => '0404010407'
        ]);

        Procedure::create([
            'name' => 'TURBINECTOMIA',
            'sus_code' => '0404010415'
        ]);

        Procedure::create([
            'name' => 'ARITENOIDECTOMIA COM LARINGOFISSURA',
            'sus_code' => '0404010431'
        ]);

        Procedure::create([
            'name' => 'ANTROSTOMIA DE MAXILA INTRANASAL',
            'sus_code' => '0404010440'
        ]);

        Procedure::create([
            'name' => 'LARINGOFISSURA PARA COLOCACAO DE MOLDE NOS TRAUMATISMOS DE LARINGE',
            'sus_code' => '0404010458'
        ]);

        Procedure::create([
            'name' => 'PAROTIDECTOMIA PARCIAL OU SUBTOTAL',
            'sus_code' => '0404010466'
        ]);

        Procedure::create([
            'name' => 'PLÁSTICA DO CANAL DE STENON',
            'sus_code' => '0404010474'
        ]);

        Procedure::create([
            'name' => 'SEPTOPLASTIA PARA CORREÇÃO DE DESVIO',
            'sus_code' => '0404010482'
        ]);

        Procedure::create([
            'name' => ' TRATAMENTO CIRÚRGICO DE IMPERFURAÇÃO COANAL (UNI / BILATERAL)',
            'sus_code' => '0404010490'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PERFURAÇÃO DO SEPTO NASAL',
            'sus_code' => '0404010504'
        ]);

        Procedure::create([
            'name' => 'SINUSOTOMIA TRANSMAXILAR ',
            'sus_code' => '0404010512'
        ]);

        Procedure::create([
            'name' => 'SEPTOPLASTIA REPARADORA NÂO ESTÉTICA',
            'sus_code' => '0404010520'
        ]);

        Procedure::create([
            'name' => 'RESSECÇÃO DE TUMOR DO ACÚSTICO (PELA FOSSA MEDIA)',
            'sus_code' => '0404010539'
        ]);

        Procedure::create([
            'name' => 'RESSECÇÃO DO GLOMO JUGULAR',
            'sus_code' => '0404010547'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE RINOFIMA',
            'sus_code' => '0404010555'
        ]);

        Procedure::create([
            'name' => 'TIREOPLASTIA',
            'sus_code' => '0404010563'
        ]);

        Procedure::create([
            'name' => 'CIRURGIA DE IMPLANTE COCLEAR UNILATERAL',
            'sus_code' => '0404010571'
        ]);

        Procedure::create([
            'name' => 'CIRURGIA DE IMPLANTE COCLEAR BILATERAL',
            'sus_code' => '0404010580'
        ]);

        Procedure::create([
            'name' => 'CIRURGIA PARA REVISÃO DO IMPLANTE COCLEAR SEM DISPOSITIVO INTERNO DO IMPLANTE COCLEAR',
            'sus_code' => '0404010598'
        ]);

        Procedure::create([
            'name' => 'CIRURGIA PARA PRÓTESE AUDITIVA ANCORADA NO OSSO - 1º TEMPO',
            'sus_code' => '0404010601'
        ]);

        Procedure::create([
            'name' => 'CIRURGIA PARA PRÓTESE AUDITIVA ANCORADA NO OSSO - 2º TEMPO',
            'sus_code' => '0404010610'
        ]);

        Procedure::create([
            'name' => 'CIRURGIA PARA PRÓTESE AUDITIVA ANCORADA NO OSSO – TEMPO ÚNICO',
            'sus_code' => '0404010628'
        ]);

        Procedure::create([
            'name' => 'CIRURGIA PARA REVISÃO DA PRÓTESE AUDITIVA ANCORADA NO OSSO',
            'sus_code' => '0404010636'
        ]);

        Procedure::create([
            'name' => 'CIRURGIA PARA REIMPLANTAÇÃO DA PRÓTESE AUDITIVA ANCORADA NO OSSO',
            'sus_code' => '0404010644'
        ]);

        Procedure::create([
            'name' => 'ALONGAMENTO DE COLUMELA',
            'sus_code' => '0404020011'
        ]);

        Procedure::create([
            'name' => 'CORRECAO CIRURGICA DE FISTULA ORO-NASAL / ORO-SINUSAL',
            'sus_code' => '0404020038'
        ]);

        Procedure::create([
            'name' => 'CORREÇÃO CIRÚRGICA DE FÍSTULA SALIVAR COM RETALHO',
            'sus_code' => '0404020046'
        ]);

        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO DA BOCA E ANEXOS',
            'sus_code' => '0404020054'
        ]);

        Procedure::create([
            'name' => 'ENXERTO TOTAL / PARCIAL INTRATEMPORAL DE NERVO FACIAL',
            'sus_code' => '0404020062'
        ]);

        Procedure::create([
            'name' => 'RESSECÇÃO DE GLÂNDULA SALIVAR ',
            'sus_code' => '0404020070'
        ]);

        Procedure::create([
            'name' => 'EXCISÃO DE RÂNULA OU FENÔMENO DE RETENÇÃO SALIVAR',
            'sus_code' => '0404020089'
        ]);

        Procedure::create([
            'name' => 'EXCISÃO E SUTURA DE LESÃO NA BOCA ',
            'sus_code' => '0404020097'
        ]);

        Procedure::create([
            'name' => 'EXCISÃO EM CUNHA DE LÁBIO',
            'sus_code' => '0404020100'
        ]);

        Procedure::create([
            'name' => 'EXCISÃO PARCIAL DE LÁBIO COM ENXERTO LIVRE / ROTAÇÃO DE RETALHO',
            'sus_code' => '0404020119'
        ]);

        Procedure::create([
            'name' => 'EXPLORAÇÃO/ DESCOMPRESSÃO TOTAL / PARCIAL DO NERVO FACIAL',
            'sus_code' => '0404020135'
        ]);

        Procedure::create([
            'name' => 'GLOSSECTOMIA PARCIAL',
            'sus_code' => '0404020143'
        ]);

        Procedure::create([
            'name' => 'MAXILECTOMIA PARCIAL',
            'sus_code' => '0404020178'
        ]);

        Procedure::create([
            'name' => 'LABIOPLASTIA PARA REDUÇÃO OU CORREÇÃO DA HIPERTROFIA DO LÁBIO',
            'sus_code' => '0404020208'
        ]);

        Procedure::create([
            'name' => 'RECONSTRUÇÃO TOTAL DE CAVIDADE ORBITÁRIA',
            'sus_code' => '0404020224'
        ]);

        Procedure::create([
            'name' => 'RECONSTRUÇÃO TOTAL OU PARCIAL DE LÁBIO',
            'sus_code' => '0404020232'
        ]);

        Procedure::create([
            'name' => 'RECONSTRUÇÃO TOTAL OU PARCIAL DE NARIZ',
            'sus_code' => '0404020240'
        ]);

        Procedure::create([
            'name' => 'RESSECÇÃO DE LESÃO MALIGNA E BENIGNA DA REGIÃO CRANIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404020275'
        ]);

        Procedure::create([
            'name' => 'RESSECÇÃO DO CÔNDILO MANDIBULAR COM OU SEM RECONSTRUÇÃO ',
            'sus_code' => '0404020291'
        ]);

        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO DOS OSSOS DA FACE',
            'sus_code' => '0404020313'
        ]);

        Procedure::create([
            'name' => 'RINOPLASTIA PARA DEFEITOS PÓS-TRAUMÁTICOS',
            'sus_code' => '0404020321'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE ATRESIA NARINÁRIA',
            'sus_code' => '0404020348'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FÍSTULA E CISTOS ORO-MAXILARES',
            'sus_code' => '0404020356'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE OSTEOMIELITE DE OSSOS DA FACE',
            'sus_code' => '0404020380'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PARALISIA FACIAL (SUSPENSÃO DE HEMIFACE)',
            'sus_code' => '0404020399'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DO SOALHO DA ÓRBITA',
            'sus_code' => '0404020429'
        ]);

        Procedure::create([
            'name' => 'CONTENÇÃO DE DENTES POR SPLINTAGEM',
            'sus_code' => '0404020445'
        ]);

        Procedure::create([
            'name' => 'OSTEOTOMIA DA MAXILA',
            'sus_code' => '0404020453'
        ]);

        Procedure::create([
            'name' => 'OSTEOTOMIA DA MANDIBULA',
            'sus_code' => '0404020461'
        ]);

        Procedure::create([
            'name' => 'RECONSTRUÇÃO DO SULCO GENGIVO-LABIAL',
            'sus_code' => '0404020470'
        ]);

        Procedure::create([
            'name' => 'OSTEOTOMIA DAS FRATURAS ALVEOLO-DENTÁRIAS',
            'sus_code' => '0404020488'
        ]);

        Procedure::create([
            'name' => 'OSTEOSSÍNTESE DE FRATURA UNILATERAL DO CÔNDILO MANDIBULAR',
            'sus_code' => '0404020496'
        ]);

        Procedure::create([
            'name' => 'OSTEOSSÍNTESE DA FRATURA COMPLEXA DA MANDÍBULA',
            'sus_code' => '0404020500'
        ]);

        Procedure::create([
            'name' => 'OSTEOSSÍNTESE DE FRATURA COMPLEXA DA MAXILA',
            'sus_code' => '0404020518'
        ]);

        Procedure::create([
            'name' => 'OSTEOSSINTESE DE FRATURA DO COMPLEXO ÓRBITO-ZIGOMÁTICO-MAXILAR',
            'sus_code' => '0404020526'
        ]);

        Procedure::create([
            'name' => 'OSTEOSSÍNTESE DE FRATURA DO COMPLEXO NASO-ÓRBITO-ETMOIDAL',
            'sus_code' => '0404020534'
        ]);

        Procedure::create([
            'name' => 'REDUÇÃO CIRÚRGICA DE FRATURA DOS OSSOS PRÓPRIOS DO NARIZ',
            'sus_code' => '0404020542'
        ]);

        Procedure::create([
            'name' => 'OSTEOSSÍNTESE DE FRATURA SIMPLES DE MANDÍBULA',
            'sus_code' => '0404020550'
        ]);

        Procedure::create([
            'name' => 'ARTROPLASTIA DA ARTICULAÇÃO TÊMPORO-MANDIBULAR (RECIDIVANTE OU NÃO)',
            'sus_code' => '0404020569'
        ]);

        Procedure::create([
            'name' => 'REDUÇÃO DE FRATURA ALVEOLO-DENTÁRIA SEM OSTEOSSÍNTESE',
            'sus_code' => '0404020577'
        ]);

        Procedure::create([
            'name' => 'REDUÇÃO DE FRATURA DA MAXILA - LE FORT I SEM OSTEOSSÍNTESE.',
            'sus_code' => '0404020585'
        ]);

        Procedure::create([
            'name' => 'REDUÇÃO DE FRATURA DA MAXILA - LE FORT II, SEM OSTEOSSÍNTESE',
            'sus_code' => '0404020593'
        ]);

        Procedure::create([
            'name' => 'REDUÇÃO DE FRATURA DA MANDÍBULA SEM OSTEOSSINTESE.',
            'sus_code' => '0404020607'
        ]);

        Procedure::create([
            'name' => 'REDUÇÃO DE LUXAÇÃO TÊMPORO-MANDIBULAR',
            'sus_code' => '0404020615'
        ]);

        Procedure::create([
            'name' => 'RETIRADA DE MATERIAL DE SÍNTESE ÓSSEA / DENTÁRIA',
            'sus_code' => '0404020623'
        ]);

        Procedure::create([
            'name' => 'RETIRADA DE MEIOS DE FIXAÇÃO MAXILO-MANDIBULAR',
            'sus_code' => '0404020631'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE ANQUILOSE DA ARTICULAÇÃO TÊMPORO-MANDIBULAR',
            'sus_code' => '0404020640'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE OSTEOMA, ODONTOMA /OUTRAS LESÕES ESPECIFICADAS',
            'sus_code' => '0404020658'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DO OSSO ZIGOMATICO SEM OSTEOSSÍNTESE',
            'sus_code' => '0404020666'
        ]);

        Procedure::create([
            'name' => 'RECONSTRUÇÃO PARCIAL DO LÁBIO TRAUMATIZADO',
            'sus_code' => '0404020674'
        ]);

        Procedure::create([
            'name' => 'OSTEOTOMIA CRÂNIO-FACIAL ',
            'sus_code' => '0404020690'
        ]);

        Procedure::create([
            'name' => 'OSTEOSSÍNTESE DA FRATURA DO OSSO ZIGOMÁTICO',
            'sus_code' => '0404020704'
        ]);

        Procedure::create([
            'name' => 'ELEVAÇÃO DO ASSOALHO DO SEIO MAXILAR',
            'sus_code' => '0404020712'
        ]);

        Procedure::create([
            'name' => 'OSTEOSSÍNTESE DE FRATURA BILATERAL DO CÔNDILO MANDIBULAR',
            'sus_code' => '0404020720'
        ]);

        Procedure::create([
            'name' => 'RECONSTRUÇÃO PARCIAL DE MANDÍBULA / MAXILA',
            'sus_code' => '0404020739'
        ]);

        Procedure::create([
            'name' => 'RESSECÇÃO DE LESÃO DA BOCA',
            'sus_code' => '0404020771'
        ]);

        Procedure::create([
            'name' => 'RECONSTRUÇÃO TOTAL DE MANDÍBULA/MAXILA',
            'sus_code' => '0404020780'
        ]);

        Procedure::create([
            'name' => 'ALONGAMENTO DE COLUMELA EM PACIENTE COM ANOMALIAS CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030017'
        ]);

        Procedure::create([
            'name' => 'OSTEOTOMIA DE MAXILA EM PACIENTES COM ANOMALIA CRANIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030033'
        ]);

        Procedure::create([
            'name' => 'MICROCIRURGIA OTOLÓGICA EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030041'
        ]);

        Procedure::create([
            'name' => 'OSTEOTOMIA DA MANDÍBULA EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030050'
        ]);

        Procedure::create([
            'name' => 'OSTEOPLASTIA DO MENTO COM OU SEM IMPLANTE ALOPLÁSTICO',
            'sus_code' => '0404030068'
        ]);

        Procedure::create([
            'name' => 'LABIOPLASTIA UNILATERAL EM DOIS TEMPOS',
            'sus_code' => '0404030076'
        ]);

        Procedure::create([
            'name' => 'ALVEOLOPLASTIA COM ENXERTO ÓSSEO EM PACIENTE COM ANOMALIA CRÂNIOFACIAL',
            'sus_code' => '0404030084'
        ]);

        Procedure::create([
            'name' => 'PALATOPLASTIA PRIMÁRIA EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030106'
        ]);

        Procedure::create([
            'name' => 'LABIOPLASTIA SECUNDÁRIA EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030122'
        ]);

        Procedure::create([
            'name' => 'RINOSEPTOPLASTIA EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030130'
        ]);

        Procedure::create([
            'name' => 'RECONSTRUÇÃO TOTAL DE LÁBIO EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL ',
            'sus_code' => '0404030157'
        ]);

        Procedure::create([
            'name' => ' RINOPLASTIA EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030165'
        ]);

        Procedure::create([
            'name' => 'SEPTOPLASTIA EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030173'
        ]);

        Procedure::create([
            'name' => 'TIMPANOPLASTIA EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL (UNI / BILATERAL)',
            'sus_code' => '0404030190'
        ]);

        Procedure::create([
            'name' => ' IMPLANTE OSTEOINTEGRADO EXTRA-ORAL BUCO-MAXILO-FACIAL',
            'sus_code' => '0404030220'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FÍSTULA ORO-SINUSAL EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030246'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FÍSTULAS ORONASAIS EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030254'
        ]);

        Procedure::create([
            'name' => 'PALATOPLASTIA SECUNDÁRIA EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030262'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DA INSUFICIÊNCIA VELOFARÍNGEA EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030270'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO REPARADOR DA FISSURA FACIAL RARA EM PACIENTES COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030289'
        ]);

        Procedure::create([
            'name' => 'OSTEOTOMIA CRANIOFACIAL COMPLEXA EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030297'
        ]);

        Procedure::create([
            'name' => 'REMODELAÇÃO CRANIOFACIAL EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0404030300'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE MACROSTOMIA /MICROSTOMIA POR ANOMALIA CRANIOFACIAL',
            'sus_code' => '0404030319'
        ]);

        Procedure::create([
            'name' => 'OSTEOPLASTIA FRONTO - ORBITAL ',
            'sus_code' => '0404030327'
        ]);

        Procedure::create([
            'name' => 'CORRECAO CIRURGICA DE ENTROPIO E ECTROPIO',
            'sus_code' => '0405010010'
        ]);

        Procedure::create([
            'name' => 'CORRECAO CIRURGICA DE EPICANTO E TELECANTO',
            'sus_code' => '0405010028'
        ]);

        Procedure::create([
            'name' => 'DACRIOCISTORRINOSTOMIA',
            'sus_code' => '0405010036'
        ]);

        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO DE PALPEBRA',
            'sus_code' => '0405010044'
        ]);

        Procedure::create([
            'name' => 'EPILACAO A LASER',
            'sus_code' => '0405010052'
        ]);

        Procedure::create([
            'name' => 'EPILACAO DE CILIOS',
            'sus_code' => '0405010060'
        ]);

        Procedure::create([
            'name' => 'EXERESE DE CALAZIO E OUTRAS PEQUENAS LESOES DA PALPEBRA E SUPERCILIOS',
            'sus_code' => '0405010079'
        ]);

        Procedure::create([
            'name' => 'EXTIRPACAO DE GLANDULA LACRIMAL ',
            'sus_code' => '0405010087'
        ]);

        Procedure::create([
            'name' => 'OCLUSAO DE PONTO LACRIMAL',
            'sus_code' => '0405010109'
        ]);

        Procedure::create([
            'name' => 'RECONSTITUICAO DE CANAL LACRIMAL',
            'sus_code' => '0405010117'
        ]);

        Procedure::create([
            'name' => 'RECONSTITUICAO PARCIAL DE PALPEBRA COM TARSORRAFIA',
            'sus_code' => '0405010125'
        ]);

        Procedure::create([
            'name' => 'RECONSTITUICAO TOTAL DE PALPEBRA',
            'sus_code' => '0405010133'
        ]);

        Procedure::create([
            'name' => 'SIMBLEFAROPLASTIA',
            'sus_code' => '0405010141'
        ]);

        Procedure::create([
            'name' => 'SONDAGEM DE CANAL LACRIMAL SOB ANESTESIA GERAL',
            'sus_code' => '0405010150'
        ]);

        Procedure::create([
            'name' => 'SONDAGEM DE VIAS LACRIMAIS',
            'sus_code' => '0405010168'
        ]);

        Procedure::create([
            'name' => 'SUTURA DE PALPEBRAS',
            'sus_code' => '0405010176'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE BLEFAROCALASE',
            'sus_code' => '0405010184'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE TRIQUIASE C/ OU S/ ENXERTO',
            'sus_code' => '0405010192'
        ]);

        Procedure::create([
            'name' => 'PUNCTOPLASTIA',
            'sus_code' => '0405010206'
        ]);

        Procedure::create([
            'name' => 'CORRECAO CIRURGICA DE ESTRABISMO (ACIMA DE 2 MUSCULOS)',
            'sus_code' => '0405020015'
        ]);

        Procedure::create([
            'name' => 'CORRECAO CIRURGICA DO ESTRABISMO (ATE 2 MUSCULOS)',
            'sus_code' => '0405020023'
        ]);

        Procedure::create([
            'name' => 'APLICACAO DE PLACA RADIOATIVA EPISCLERAL',
            'sus_code' => '0405030010'
        ]);

        Procedure::create([
            'name' => 'BIOPSIA DE TUMOR INTRA OCULAR ',
            'sus_code' => '0405030029'
        ]);

        Procedure::create([
            'name' => 'CRIOTERAPIA OCULAR',
            'sus_code' => '0405030037'
        ]);

        Procedure::create([
            'name' => 'FOTOCOAGULACAO A LASER',
            'sus_code' => '0405030045'
        ]);

        Procedure::create([
            'name' => 'INJECAO INTRA-VITREO',
            'sus_code' => '0405030053'
        ]);

        Procedure::create([
            'name' => 'RETINOPEXIA C/ INTROFLEXAO ESCLERAL',
            'sus_code' => '0405030070'
        ]);

        Procedure::create([
            'name' => 'SUTURA DE ESCLERA',
            'sus_code' => '0405030096'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE DEISCENCIA DE SUTURA DE ESCLERA ',
            'sus_code' => '0405030100'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE MIIASE PALPEBRAL',
            'sus_code' => '0405030118'
        ]);

        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE NEOPLASIA DE ESCLERA',
            'sus_code' => '0405030126'
        ]);

        Procedure::create([
            'name' => 'VITRECTOMIA ANTERIOR',
            'sus_code' => '0405030134'
        ]);

        Procedure::create([
            'name' => 'VITRECTOMIA POSTERIOR',
            'sus_code' => '0405030142'
        ]);

        Procedure::create([
            'name' => 'VITRIOLISE A YAG LASER',
            'sus_code' => '0405030150'
        ]);

        Procedure::create([
            'name' => 'VITRECTOMIA POSTERIOR COM INFUSÃO DE PERFLUOCARBONO E ENDOLASER',
            'sus_code' => '0405030169'
        ]);

        Procedure::create([
            'name' => 'VITRECTOMIA POSTERIOR COM INFUSÃO DE PERFLUOCARBONO/ÓLEO DE SILICONE/ENDOLASER ',
            'sus_code' => '0405030177'
        ]);

        Procedure::create([
            'name' => 'TERMOTERAPIA TRANSPUPILAR',
            'sus_code' => '0405030185'
        ]);

        Procedure::create([
            'name' => 'PAN-FOTOCOAGULAÇÃO DE RETINA A LASER',
            'sus_code' => '0405030193'
        ]);

        Procedure::create([
            'name' => 'DRENAGEM DE HEMORRAGIA DE COROIDE ',
            'sus_code' => '0405030207'
        ]);

        Procedure::create([
            'name' => 'RETINOPEXIA PNEUMATICA',
            'sus_code' => '0405030215'
        ]);

        Procedure::create([
            'name' => 'REMOÇÃO DE OLEO DE SILICONE',
            'sus_code' => '0405030223'
        ]);

        Procedure::create([
            'name' => 'REMOÇÃO DE IMPLANTE EPISCLERAL',
            'sus_code' => '0405030231'
        ]);

        Procedure::create([
            'name' => 'CORRECAO CIRURGICA DE LAGOFTALMO',
            'sus_code' => '0405040016'
        ]);

        Procedure::create([
            'name' => 'CRIOTERAPIA DE TUMORES INTRA-OCULARES',
            'sus_code' => '0405040024'
        ]);

        Procedure::create([
            'name' => 'DESCOMPRESSAO DE NERVO OPTICO ',
            'sus_code' => '0405040040'
        ]);

        Procedure::create([
            'name' => 'DESCOMPRESSAO DE ORBITA',
            'sus_code' => '0405040059'
        ]);
        Procedure::create([
            'name' => 'ENUCLEACAO DE GLOBO OCULAR',
            'sus_code' => '0405040067'
        ]);


        Procedure::create([
            'name' => 'EVISCERACAO DE GLOBO OCULAR',
            'sus_code' => '0405040075'
        ]);


        Procedure::create([
            'name' => 'EXENTERACAO DE ORBITA',
            'sus_code' => '0405040083'
        ]);


        Procedure::create([
            'name' => 'EXERESE DE TUMOR MALIGNO INTRA-OCULAR',
            'sus_code' => '0405040091'
        ]);


        Procedure::create([
            'name' => 'EXPLANTE DE LENTE INTRA OCULAR',
            'sus_code' => '0405040105'
        ]);


        Procedure::create([
            'name' => 'INJECAO RETROBULBAR / PERIBULBAR',
            'sus_code' => '0405040130'
        ]);


        Procedure::create([
            'name' => 'ORBITOTOMIA',
            'sus_code' => '0405040148'
        ]);


        Procedure::create([
            'name' => 'RECONSTITUICAO DE CAVIDADE ORBITÁRIA',
            'sus_code' => '0405040156'
        ]);


        Procedure::create([
            'name' => 'RECONSTITUICAO DE PAREDE DA ORBITA',
            'sus_code' => '0405040164'
        ]);


        Procedure::create([
            'name' => 'TRANSPLANTE DE PERIOSTEO EM ESCLEROMALACIA',
            'sus_code' => '0405040180'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE XANTELASMA',
            'sus_code' => '0405040199'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE PTOSE PALPEBRAL ',
            'sus_code' => '0405040202'
        ]);


        Procedure::create([
            'name' => 'REPOSICIONAMENTO DE LENTE INTRAOCULAR',
            'sus_code' => '0405040210'
        ]);


        Procedure::create([
            'name' => 'CAPSULECTOMIA POSTERIOR CIRURGICA ',
            'sus_code' => '0405050011'
        ]);


        Procedure::create([
            'name' => 'CAPSULOTOMIA A YAG LASER ',
            'sus_code' => '0405050020'
        ]);


        Procedure::create([
            'name' => 'CAUTERIZACAO DE CORNEA',
            'sus_code' => '0405050038'
        ]);


        Procedure::create([
            'name' => 'CICLOCRIOCOAGULACAO / DIATERMIA ',
            'sus_code' => '0405050046'
        ]);


        Procedure::create([
            'name' => 'CICLODIALISE',
            'sus_code' => '0405050054'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE ASTIGMATISMO SECUNDARIO',
            'sus_code' => '0405050062'
        ]);


        Procedure::create([
            'name' => 'CORRECAO CIRURGICA DE HERNIA DE IRIS',
            'sus_code' => '0405050070'
        ]);


        Procedure::create([
            'name' => 'EXERESE DE TUMOR DE CONJUNTIVA',
            'sus_code' => '0405050089'
        ]);


        Procedure::create([
            'name' => 'FACECTOMIA C/ IMPLANTE DE LENTE INTRA-OCULAR',
            'sus_code' => '0405050097'
        ]);


        Procedure::create([
            'name' => 'FACECTOMIA S/ IMPLANTE DE LENTE INTRA-OCULAR',
            'sus_code' => '0405050100'
        ]);


        Procedure::create([
            'name' => 'FACOEMULSIFICACAO C/ IMPLANTE DE LENTE INTRA-OCULAR RIGIDA',
            'sus_code' => '0405050119'
        ]);


        Procedure::create([
            'name' => 'FOTOTRABECULOPLASTIA A LASER',
            'sus_code' => '0405050127'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE PROTESE ANTI-GLAUCOMATOSA',
            'sus_code' => '0405050135'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE INTRA-ESTROMAL',
            'sus_code' => '0405050143'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE SECUNDARIO DE LENTE INTRA-OCULAR - LIO',
            'sus_code' => '0405050151'
        ]);


        Procedure::create([
            'name' => 'INJECAO SUBCONJUTIVAL / SUBTENONIANA',
            'sus_code' => '0405050160'
        ]);


        Procedure::create([
            'name' => 'IRIDECTOMIA CIRURGICA',
            'sus_code' => '0405050178'
        ]);


        Procedure::create([
            'name' => 'IRIDOCICLECTOMIA',
            'sus_code' => '0405050186'
        ]);


        Procedure::create([
            'name' => 'IRIDOTOMIA A LASER',
            'sus_code' => '0405050194'
        ]);


        Procedure::create([
            'name' => 'PARACENTESE DE CAMARA ANTERIOR',
            'sus_code' => '0405050208'
        ]);


        Procedure::create([
            'name' => 'RECOBRIMENTO CONJUNTIVAL ',
            'sus_code' => '0405050216'
        ]);


        Procedure::create([
            'name' => 'RECONSTITUICAO DE FORNIX CONJUNTIVAL',
            'sus_code' => '0405050224'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO DE CAMARA ANTERIOR DO OLHO',
            'sus_code' => '0405050232'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO DA CAMARA ANTERIOR DO OLHO',
            'sus_code' => '0405050240'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO DA CORNEA',
            'sus_code' => '0405050259'
        ]);


        Procedure::create([
            'name' => 'SINEQUIOLISE A YAG LASER ',
            'sus_code' => '0405050267'
        ]);


        Procedure::create([
            'name' => 'SUBSTITUICAO DE LENTE INTRA-OCULAR',
            'sus_code' => '0405050283'
        ]);


        Procedure::create([
            'name' => 'SUTURA DE CONJUNTIVA',
            'sus_code' => '0405050291'
        ]);


        Procedure::create([
            'name' => 'SUTURA DE CORNEA',
            'sus_code' => '0405050305'
        ]);


        Procedure::create([
            'name' => 'TOPOPLASTIA DO TRANSPLANTE',
            'sus_code' => '0405050313'
        ]);


        Procedure::create([
            'name' => 'TRABECULECTOMIA',
            'sus_code' => '0405050321'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE GLAUCOMA CONGENITO',
            'sus_code' => '0405050356'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE PTERIGIO',
            'sus_code' => '0405050364'
        ]);


        Procedure::create([
            'name' => 'FACOEMULSIFICACAO C/ IMPLANTE DE LENTE INTRA-OCULAR DOBRAVEL',
            'sus_code' => '0405050372'
        ]);


        Procedure::create([
            'name' => 'CIRURGIA DE CATARATA CONGÊNITA',
            'sus_code' => '0405050380'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEISCÊNCIA DE SUTURA DE CÓRNEA',
            'sus_code' => '0405050399'
        ]);


        Procedure::create([
            'name' => 'RADIAÇÃO PARA CROSS LINKING CORNEANO',
            'sus_code' => '0405050402'
        ]);


        Procedure::create([
            'name' => 'ABERTURA DE COMUNICACAO INTER-ATRIAL',
            'sus_code' => '0406010013'
        ]);


        Procedure::create([
            'name' => 'ABERTURA DE ESTENOSE AORTICA VALVAR',
            'sus_code' => '0406010021'
        ]);


        Procedure::create([
            'name' => 'ABERTURA DE ESTENOSE PULMONAR VALVAR',
            'sus_code' => '0406010030'
        ]);


        Procedure::create([
            'name' => 'AMPLIACAO DE VIA DE SAIDA DO VENTRICULO DIREITO E/OU RAMOS PULMONARES',
            'sus_code' => '0406010048'
        ]);


        Procedure::create([
            'name' => 'AMPLIACAO DE VIA DE SAIDA DO VENTRICULO ESQUERDO',
            'sus_code' => '0406010056'
        ]);


        Procedure::create([
            'name' => 'ANASTOMOSE CAVO-PULMONAR BIDIRECIONAL',
            'sus_code' => '0406010064'
        ]);


        Procedure::create([
            'name' => 'ANASTOMOSE CAVO-PULMONAR TOTAL',
            'sus_code' => '0406010072'
        ]);


        Procedure::create([
            'name' => 'ANASTOMOSE SISTEMICO-PULMONAR ',
            'sus_code' => '0406010080'
        ]);


        Procedure::create([
            'name' => 'BANDAGEM DA ARTERIA PULMONAR',
            'sus_code' => '0406010099'
        ]);


        Procedure::create([
            'name' => 'CARDIORRAFIA',
            'sus_code' => '0406010102'
        ]);


        Procedure::create([
            'name' => 'CARDIOTOMIA P/ RETIRADA DE CORPO ESTRANHO',
            'sus_code' => '0406010110'
        ]);


        Procedure::create([
            'name' => 'COLOCACAO DE BALAO INTRA-AORTICO',
            'sus_code' => '0406010129'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE ANEURISMA / DISSECCAO DA AORTA TORACO-ABDOMINAL',
            'sus_code' => '0406010137'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE ATRESIA PULMONAR E COMUNICACAO INTERVENTRICULAR',
            'sus_code' => '0406010153'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE ATRIO UNICO',
            'sus_code' => '0406010161'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE BANDA ANOMALA DO VENTRICULO DIREITO',
            'sus_code' => '0406010170'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE COARCTACAO DA AORTA ',
            'sus_code' => '0406010188'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE COMUNICACAO INTER-VENTRICULAR',
            'sus_code' => '0406010196'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE COMUNICACAO INTER-VENTRICULAR E INSUFICIENCIA AORTICA',
            'sus_code' => '0406010200'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE COR TRIATRIATUM',
            'sus_code' => '0406010218'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE CORONARIA ANOMALA (0 A 3 ANOS)',
            'sus_code' => '0406010226'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE DRENAGEM ANOMALA DO RETORNO SISTEMICO',
            'sus_code' => '0406010234'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE DRENAGEM ANOMALA PARCIAL DE VEIAS PULMONARES',
            'sus_code' => '0406010242'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE DRENAGEM ANOMALA TOTAL DE VEIAS PULMONARES',
            'sus_code' => '0406010250'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE DUPLA VIA DE SAIDA DO VENTRICULO DIREITO',
            'sus_code' => '0406010269'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE DUPLA VIA DE SAIDA DO VENTRICULO ESQUERDO',
            'sus_code' => '0406010277'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE ESTENOSE AORTICA (0 A 3 ANOS)',
            'sus_code' => '0406010285'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE ESTENOSE MITRAL CONGENITA',
            'sus_code' => '0406010293'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE ESTENOSE SUPRA-AORTICA',
            'sus_code' => '0406010307'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE FISTULA AORTO-CAVITARIAS',
            'sus_code' => '0406010315'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE HIPERTROFIA SEPTAL ASSIMETRICA',
            'sus_code' => '0406010323'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE HIPOPLASIA DE VENTRICULO ESQUERDO',
            'sus_code' => '0406010331'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE INSUFICIENCIA DA VALVULA TRICUSPIDE',
            'sus_code' => '0406010340'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE INSUFICIENCIA MITRAL CONGENITA',
            'sus_code' => '0406010358'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE INTERRUPCAO DO ARCO AORTICO',
            'sus_code' => '0406010366'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE JANELA AORTO-PULMONAR ',
            'sus_code' => '0406010374'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE JANELA AORTO-PULMONAR ',
            'sus_code' => '0406010382'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE LESOES NA TRANSPOSICAO CORRIGIDA DOS VASOS DA BASE',
            'sus_code' => '0406010390'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE PERSISTENCIA DO CANAL ARTERIAL',
            'sus_code' => '0406010404'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE PERSISTENCIA DO CANAL ARTERIAL NO RECEM-NASCIDO',
            'sus_code' => '0406010412'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE TETRALOGIA DE FALLOT E VARIANTES (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406010420'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE TETRALOGIA DE FALLOT E VARIANTES',
            'sus_code' => '0406010439'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE TRANSPOSICAO DOS GRANDES VASOS DA BASE (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406010447'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE TRANSPOSICAO DE GRANDES VASOS DA BASE',
            'sus_code' => '0406010455'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE TRONCO ARTERIOSO PERSISTENTE',
            'sus_code' => '0406010463'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE VENTRICULO UNICO',
            'sus_code' => '0406010471'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DO CANAL ATRIO-VENTRICULAR (PARCIAL / INTERMEDIARIO)',
            'sus_code' => '0406010480'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DO CANAL ATRIO-VENTRICULAR (TOTAL)',
            'sus_code' => '0406010498'
        ]);


        Procedure::create([
            'name' => 'CORRECOES DE ANOMALIAS DO ARCO AORTICO',
            'sus_code' => '0406010501'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM C/ BIOPSIA DE PERICARDIO ',
            'sus_code' => '0406010510'
        ]);


        Procedure::create([
            'name' => 'EXERESE DE CISTO PERICARDICO',
            'sus_code' => '0406010528'
        ]);


        Procedure::create([
            'name' => 'FECHAMENTO DE COMUNICACAO INTERATRIAL',
            'sus_code' => '0406010536'
        ]);


        Procedure::create([
            'name' => 'FECHAMENTO DE COMUNICACAO INTERVENTRICULAR',
            'sus_code' => '0406010544'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE C/ TROCA DE POSICAO DE VALVAS (CIRURGIA DE ROSS)',
            'sus_code' => '0406010552'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE CARDIOVERSOR DESFIBRILADOR DE CAMARA UNICA TRANSVENOSO',
            'sus_code' => '0406010560'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE CARDIOVERSOR DESFIBRILADOR (CDI) MULTI-SITIO TRANSVENOSO EPIMIOCARDICO POR TORACOTOMIA P/ IMPLANTE DE ELETRODO',
            'sus_code' => '0406010579'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE CARDIOVERSOR DESFIBRILADOR DE CAMARA DUPLA TRANSVENOSO',
            'sus_code' => '0406010587'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE CARDIOVERSOR DESFIBRILADOR MULTI-SITIO ENDOCAVITARIO C/ REVERSAO PARA EPIMIOCARDICO POR TORACOTOMIA',
            'sus_code' => '0406010595'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE CARDIOVERSOR DESFIBRILADOR (CDI) MULTI-SITIO TRANSVENOSO',
            'sus_code' => '0406010609'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE MARCAPASSO CARDIACO MULTI-SITIO ENDOCAVITARIO C/ REVERSAO P/ EPIMIOCARDICO (POR TORACOTOMIA)',
            'sus_code' => '0406010617'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE MARCAPASSO CARDIACO MULTI-SITIO EPIMIOCARDICO POR TORACOTOMIA P/IMPLANTE DE ELETRODO',
            'sus_code' => '0406010625'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE MARCAPASSO CARDIACO MULTI-SITIO TRANSVENOSO ',
            'sus_code' => '0406010633'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE MARCAPASSO DE CAMARA DUPLA EPIMIOCARDICO',
            'sus_code' => '0406010641'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE MARCAPASSO DE CAMARA DUPLA TRANSVENOSO',
            'sus_code' => '0406010650'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE MARCAPASSO DE CAMARA UNICA EPIMIOCARDICO',
            'sus_code' => '0406010668'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE MARCAPASSO DE CAMARA UNICA TRANSVENOSO',
            'sus_code' => '0406010676'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE MARCAPASSO TEMPORARIO TRANSVENOSO',
            'sus_code' => '0406010684'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE PROTESE VALVAR',
            'sus_code' => '0406010692'
        ]);


        Procedure::create([
            'name' => 'INFARTECTOMIA / ANEURISMECTOMIA ASSOCIADA OU NAO A REVASCULARIZACAO MIOCARDICA ',
            'sus_code' => '0406010706'
        ]);


        Procedure::create([
            'name' => 'INSTALACAO DE ASSISTENCIA CIRCULATORIA',
            'sus_code' => '0406010714'
        ]);


        Procedure::create([
            'name' => 'INSTALACAO DE CATETER DE TERMODILUICAO',
            'sus_code' => '0406010722'
        ]);


        Procedure::create([
            'name' => 'LIGADURA DE FISTULA SISTEMICO-PULMONAR',
            'sus_code' => '0406010730'
        ]);


        Procedure::create([
            'name' => 'MANUTENCAO DE ASSISTENCIA CIRCULATORIA',
            'sus_code' => '0406010749'
        ]);


        Procedure::create([
            'name' => 'PERICARDIECTOMIA',
            'sus_code' => '0406010757'
        ]);


        Procedure::create([
            'name' => 'PERICARDIECTOMIA PARCIAL ',
            'sus_code' => '0406010765'
        ]);


        Procedure::create([
            'name' => 'PERICARDIOCENTESE',
            'sus_code' => '0406010773'
        ]);


        Procedure::create([
            'name' => 'PLASTICA / TROCA DE VALVULA TRICUSPIDE (ANOMALIA DE EBSTEIN)',
            'sus_code' => '0406010781'
        ]);


        Procedure::create([
            'name' => 'PLASTICA DE LOJA DE GERADOR DE SISTEMA DE ESTIMULACAO CARDIACA ARTIFICIAL',
            'sus_code' => '0406010790'
        ]);


        Procedure::create([
            'name' => 'PLASTICA VALVAR',
            'sus_code' => '0406010803'
        ]);


        Procedure::create([
            'name' => 'PLASTICA VALVAR C/ REVASCULARIZACAO MIOCARDICA',
            'sus_code' => '0406010811'
        ]);


        Procedure::create([
            'name' => 'PLASTICA VALVAR E/OU TROCA VALVAR MULTIPLA',
            'sus_code' => '0406010820'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO DA RAIZ DA AORTA ',
            'sus_code' => '0406010838'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO DA RAIZ DA AORTA C/ TUBO VALVADO',
            'sus_code' => '0406010846'
        ]);


        Procedure::create([
            'name' => 'REPOSICIONAMENTO DE ELETRODOS DE CARDIOVERSOR DESFIBRILADOR',
            'sus_code' => '0406010854'
        ]);


        Procedure::create([
            'name' => 'REPOSICIONAMENTO DE ELETRODOS DE MARCAPASSO',
            'sus_code' => '0406010862'
        ]);


        Procedure::create([
            'name' => 'REPOSICIONAMENTO DE ELETRODOS DE MARCAPASSO MULTI-SITIO ',
            'sus_code' => '0406010870'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE ENDOMIOCARDIOFIBROSE ',
            'sus_code' => '0406010889'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE MEMBRANA SUB-AORTICA ',
            'sus_code' => '0406010897'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE TUMOR INTRACARDIACO',
            'sus_code' => '0406010900'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE SISTEMA DE ESTIMULACAO CARDIACA ARTIFICIAL',
            'sus_code' => '0406010919'
        ]);


        Procedure::create([
            'name' => 'REVASCULARIZACAO MIOCARDICA C/ USO DE EXTRACORPOREA',
            'sus_code' => '0406010927'
        ]);


        Procedure::create([
            'name' => 'REVASCULARIZACAO MIOCARDICA C/ USO DE EXTRACORPOREA (C/ 2 OU MAIS ENXERTOS)',
            'sus_code' => '0406010935'
        ]);


        Procedure::create([
            'name' => 'REVASCULARIZACAO MIOCARDICA S/ USO DE EXTRACORPOREA',
            'sus_code' => '0406010943'
        ]);


        Procedure::create([
            'name' => 'REVASCULARIZACAO MIOCARDICA S/ USO DE EXTRACORPOREA (C/ 2 OU MAIS ENXERTOS)',
            'sus_code' => '0406010951'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE CONTUSAO MIOCARDICA ',
            'sus_code' => '0406010960'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE FERIMENTO CARDIACO PERFURO-CORTANTE',
            'sus_code' => '0406010978'
        ]);


        Procedure::create([
            'name' => 'TROCA DE AORTA ASCENDENTE',
            'sus_code' => '0406010986'
        ]);


        Procedure::create([
            'name' => 'TROCA DE ARCO AORTICO',
            'sus_code' => '0406010994'
        ]);


        Procedure::create([
            'name' => 'TROCA DE CONJUNTO DO SEIO CORONARIO NO MARCAPASSO MULTI-SITIO',
            'sus_code' => '0406011001'
        ]);


        Procedure::create([
            'name' => 'TROCA DE ELETRODOS DE DESFIBRILADOR DE CARDIO-DESFIBRILADOR TRANSVENOSO ',
            'sus_code' => '0406011010'
        ]);


        Procedure::create([
            'name' => 'TROCA DE ELETRODOS DE DESFIBRILADOR NO CARDIO-DESFIBRILADOR MULTI-SITIO ',
            'sus_code' => '0406011028'
        ]);


        Procedure::create([
            'name' => 'TROCA DE ELETRODOS DE MARCAPASSO DE CAMARA DUPLA',
            'sus_code' => '0406011036'
        ]);


        Procedure::create([
            'name' => 'TROCA DE ELETRODOS DE MARCAPASSO DE CAMARA UNICA',
            'sus_code' => '0406011044'
        ]);


        Procedure::create([
            'name' => 'TROCA DE ELETRODOS DE MARCAPASSO EM CARDIO-DESFIBRILADOR DE CAMARA DUPLA TRANSVENOSO',
            'sus_code' => '0406011052'
        ]);


        Procedure::create([
            'name' => 'TROCA DE ELETRODOS DE MARCAPASSO NO CARDIO-DESFIBRILADOR MULTI-SITIO',
            'sus_code' => '0406011079'
        ]);


        Procedure::create([
            'name' => 'TROCA DE ELETRODOS DE MARCAPASSO NO MARCAPASSO MULTI-SITIO',
            'sus_code' => '0406011087'
        ]);


        Procedure::create([
            'name' => 'TROCA DE ELETRODOS DE SEIO CORONARIO NO CARDIOVERSOR DESFIBRILADOR MULTI-SITIO ',
            'sus_code' => '0406011095'
        ]);


        Procedure::create([
            'name' => 'TROCA DE GERADOR DE CARDIO-DESFIBRILADOR DE CAMARA UNICA / DUPLA',
            'sus_code' => '0406011109'
        ]);


        Procedure::create([
            'name' => 'TROCA DE GERADOR DE CARDIO-DESFIBRILADOR MULTI-SITIO',
            'sus_code' => '0406011117'
        ]);


        Procedure::create([
            'name' => 'TROCA DE GERADOR DE MARCAPASSO DE CAMARA DUPLA',
            'sus_code' => '0406011125'
        ]);


        Procedure::create([
            'name' => 'TROCA DE GERADOR DE MARCAPASSO DE CAMARA UNICA',
            'sus_code' => '0406011133'
        ]);


        Procedure::create([
            'name' => 'TROCA DE GERADOR DE MARCAPASSO MULTI-SITIO',
            'sus_code' => '0406011141'
        ]);


        Procedure::create([
            'name' => 'TROCA DE GERADOR E DE ELETRODO DE MARCAPASSO DE CAMARA UNICA',
            'sus_code' => '0406011150'
        ]);


        Procedure::create([
            'name' => 'TROCA DE GERADOR E DE ELETRODOS DE CARDIO-DESFIBRILADOR ',
            'sus_code' => '0406011168'
        ]);


        Procedure::create([
            'name' => 'TROCA DE GERADOR E DE ELETRODOS DE CARDIO-DESFIBRILADOR MULTISITIO',
            'sus_code' => '0406011176'
        ]);


        Procedure::create([
            'name' => 'TROCA DE GERADOR E DE ELETRODOS DE MARCAPASSO DE CAMARA DUPLA',
            'sus_code' => '0406011184'
        ]);


        Procedure::create([
            'name' => 'TROCA DE GERADOR E DE ELETRODOS NO MARCAPASSO MULTI-SITIO',
            'sus_code' => '0406011192'
        ]);


        Procedure::create([
            'name' => 'TROCA VALVAR C/ REVASCULARIZACAO MIOCARDICA',
            'sus_code' => '0406011206'
        ]);


        Procedure::create([
            'name' => 'UNIFOCALIZACAO DE RAMOS DA ARTERIA PULMONAR C/ CIRCULACAO EXTRACORPOREA ',
            'sus_code' => '0406011214'
        ]);


        Procedure::create([
            'name' => 'UNIFOCALIZACAO DE RAMOS DA ARTERIA PULMONAR S/ CIRCULACAO EXTRACORPOREA ',
            'sus_code' => '0406011222'
        ]);


        Procedure::create([
            'name' => 'ANASTOMOSE SISTEMICO PULMONAR COM CEC',
            'sus_code' => '0406011230'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE COARCTACAO DA AORTA COM CEC',
            'sus_code' => '0406011249'
        ]);


        Procedure::create([
            'name' => 'CORREÇÃO DE CORONARIA ANOMALA (19 A 110)',
            'sus_code' => '0406011257'
        ]);


        Procedure::create([
            'name' => 'ABERTURA DE ESTENOSE AORTICA VALVAR (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011265'
        ]);


        Procedure::create([
            'name' => 'ABERTURA DE ESTENOSE PULMONAR VALVAR (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011273'
        ]);


        Procedure::create([
            'name' => 'AMPLIAÇÃO DE VIA DE SAÍDA DO VENTRÍCULO DIREITO E/OU RAMOS PULMONARES (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011281'
        ]);


        Procedure::create([
            'name' => 'AMPLIAÇÃO DE VIA DE SAÍDA DO VENTRÍCULO ESQUERDO (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011290'
        ]);


        Procedure::create([
            'name' => 'ANASTOMOSE CAVO-PULMONAR BIDIRECIONAL (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011303'
        ]);


        Procedure::create([
            'name' => 'ANASTOMOSE SISTEMICO-PULMONAR (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011311'
        ]);


        Procedure::create([
            'name' => 'BANDAGEM DA ARTERIA PULMONAR (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011320'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE COARCTACAO DA AORTA (CRIANÇA E ADOLESCENTE) ',
            'sus_code' => '0406011338'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE DRENAGEM ANOMALA DO RETORNO SISTEMICO (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011346'
        ]);


        Procedure::create([
            'name' => 'CORREÇÃO DE DRENAGEM ANOMALA PARCIAL DE VEIAS PULMONARES (CRIANÇA E ADOLESCENTE) ',
            'sus_code' => '0406011354'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE ESTENOSE MITRAL CONGENITA (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011362'
        ]);


        Procedure::create([
            'name' => 'CORREÇÃO DE ESTENOSE SUPRA-AÓRTICA (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011370'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE FISTULA AORTO-CAVITARIAS (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011389'
        ]);


        Procedure::create([
            'name' => 'CORREÇÃO DE HIPERTROFIA SEPTAL ASSIMETRICA (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011397'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE INSUFICIENCIA DA VALVULA TRICUSPIDE (CRIANÇA E ADOLESCENTE) ',
            'sus_code' => '0406011400'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE INSUFICIENCIA MITRAL CONGENITA (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011419'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE PERSISTENCIA DO CANAL ARTERIAL (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011427'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DO CANAL ATRIO-VENTRICULAR PARCIAL / INTERMEDIARIO (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011435'
        ]);


        Procedure::create([
            'name' => 'CORRECOES DE ANOMALIAS DO ARCO AORTICO (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011443'
        ]);


        Procedure::create([
            'name' => 'FECHAMENTO DE COMUNICACAO INTERATRIAL (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011451'
        ]);


        Procedure::create([
            'name' => 'FECHAMENTO DE COMUNICACAO INTERVENTRICULAR (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011460'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE C/ TROCA DE POSICAO DE VALVAS (CIRURGIA DE ROSS) (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011478'
        ]);


        Procedure::create([
            'name' => 'LIGADURA DE FISTULA SISTEMICO-PULMONAR (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011486'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE MEMBRANA SUB-AORTICA (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011494'
        ]);


        Procedure::create([
            'name' => 'ANASTOMOSE SISTEMICO PULMONAR COM CEC (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011508'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE COARCTACAO DA AORTA COM CEC (CRIANÇA E ADOLESCENTE)',
            'sus_code' => '0406011516'
        ]);


        Procedure::create([
            'name' => 'ANASTOMOSE ESPLENO-RENAL / OUTRA DERIVACAO CENTRAL',
            'sus_code' => '0406020019'
        ]);


        Procedure::create([
            'name' => 'ANASTOMOSE LINFOVENOSA',
            'sus_code' => '0406020027'
        ]);


        Procedure::create([
            'name' => 'ANASTOMOSE PORTO-CAVA',
            'sus_code' => '0406020035'
        ]);


        Procedure::create([
            'name' => 'ANEURISMECTOMIA DE AORTA ABDOMINAL INFRA-RENAL',
            'sus_code' => '0406020043'
        ]);


        Procedure::create([
            'name' => 'ANEURISMECTOMIA TORACO-ABDOMINAL',
            'sus_code' => '0406020051'
        ]);


        Procedure::create([
            'name' => 'IMPLANTAÇÃO DE CATETER DE LONGA PERMANÊNCIA SEMI OU TOTALMENTE IMPLANTAVEL (Procedure PRINCIPAL)',
            'sus_code' => '0406020078'
        ]);


        Procedure::create([
            'name' => 'CONFECCAO DE FISTULA ARTERIOVENOSA P/ ACESSO',
            'sus_code' => '0406020086'
        ]);


        Procedure::create([
            'name' => 'DISSECCAO DE VEIA / ARTERIA',
            'sus_code' => '0406020094'
        ]);


        Procedure::create([
            'name' => 'DISSECCAO RADICAL DO PESCOCO',
            'sus_code' => '0406020108'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE GANGLIO LINFATICO ',
            'sus_code' => '0406020116'
        ]);


        Procedure::create([
            'name' => 'EMBOLECTOMIA ARTERIAL',
            'sus_code' => '0406020124'
        ]);


        Procedure::create([
            'name' => 'EXCISAO E SUTURA DE HEMANGIOMA',
            'sus_code' => '0406020132'
        ]);


        Procedure::create([
            'name' => 'EXCISAO E SUTURA DE LINFANGIOMA / NEVUS',
            'sus_code' => '0406020140'
        ]);


        Procedure::create([
            'name' => 'EXERESE DE GANGLIO LINFATICO',
            'sus_code' => '0406020159'
        ]);


        Procedure::create([
            'name' => 'FASCIOTOMIA P/ DESCOMPRESSAO',
            'sus_code' => '0406020167'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA MEDIASTINAL',
            'sus_code' => '0406020183'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA PELVICA',
            'sus_code' => '0406020191'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA PROFUNDA ',
            'sus_code' => '0406020205'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA RADICAL AXILAR BILATERAL',
            'sus_code' => '0406020213'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA RADICAL AXILAR UNILATERAL',
            'sus_code' => '0406020221'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA RADICAL CERVICAL BILATERAL',
            'sus_code' => '0406020230'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA RADICAL CERVICAL UNILATERAL',
            'sus_code' => '0406020248'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA RADICAL INGUINAL BILATERAL',
            'sus_code' => '0406020256'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA RADICAL INGUINAL UNILATERAL',
            'sus_code' => '0406020264'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA RADICAL VULVAR',
            'sus_code' => '0406020272'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA RETROPERITONIAL ',
            'sus_code' => '0406020280'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA SUPERFICIAL',
            'sus_code' => '0406020299'
        ]);


        Procedure::create([
            'name' => 'PLASTIA ARTERIAL C/ REMENDO (QUALQUER TECNICA)',
            'sus_code' => '0406020302'
        ]);


        Procedure::create([
            'name' => 'PONTE AXILO-BIFEMURAL',
            'sus_code' => '0406020310'
        ]);


        Procedure::create([
            'name' => 'PONTE AXILO-FEMURAL',
            'sus_code' => '0406020329'
        ]);


        Procedure::create([
            'name' => 'PONTE DE RAMOS DOS TRONCOS SUPRA-AORTICOS',
            'sus_code' => '0406020337'
        ]);


        Procedure::create([
            'name' => 'PONTE FEMORO-FEMURAL CRUZADA',
            'sus_code' => '0406020345'
        ]);


        Procedure::create([
            'name' => 'PONTE-TROMBOENDARTERECTOMIA AORTO-FEMURAL',
            'sus_code' => '0406020353'
        ]);


        Procedure::create([
            'name' => 'PONTE-TROMBOENDARTERECTOMIA AORTO-ILIACA',
            'sus_code' => '0406020361'
        ]);


        Procedure::create([
            'name' => 'PONTE-TROMBOENDARTERECTOMIA DE CAROTIDA',
            'sus_code' => '0406020370'
        ]);


        Procedure::create([
            'name' => 'PONTE-TROMBOENDARTERECTOMIA ILIACO-FEMURAL',
            'sus_code' => '0406020388'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE PROTESE INFECTADA EM POSICAO AORTO- ABDOMINAL C/ PONTE AXILO FEMURAL/AXILO BIFEMURAL CRUZADO',
            'sus_code' => '0406020396'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE PROTESE INFECTADA EM POSICAO NAO AORTICA',
            'sus_code' => '0406020400'
        ]);


        Procedure::create([
            'name' => 'REVASCULARIZACAO DE ARTERIAS VISCERAIS',
            'sus_code' => '0406020418'
        ]);


        Procedure::create([
            'name' => 'REVASCULARIZACAO DO MEMBRO SUPERIOR',
            'sus_code' => '0406020426'
        ]);


        Procedure::create([
            'name' => 'REVASCULARIZACAO POR PONTE / TROMBOENDARTERECTOMIA DE OUTRAS ARTERIAS DISTAIS',
            'sus_code' => '0406020434'
        ]);


        Procedure::create([
            'name' => 'REVASCULARIZACAO POR PONTE / TROMBOENDARTERECTOMIA FEMURO-POPLITEA DISTAL',
            'sus_code' => '0406020442'
        ]);


        Procedure::create([
            'name' => 'REVASCULARIZACAO POR PONTE / TROMBOENDARTERECTOMIA FEMURO-POPLITEA PROXIMAL',
            'sus_code' => '0406020450'
        ]);


        Procedure::create([
            'name' => 'TRANSPLANTE DE SEGMENTO VENOSO VALVULADO',
            'sus_code' => '0406020469'
        ]);


        Procedure::create([
            'name' => 'TRANSPOSICAO DE VEIAS DO SISTEMA VENOSO PROFUNDO',
            'sus_code' => '0406020477'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE ANEURISMAS DAS ARTERIAS VISCERAIS',
            'sus_code' => '0406020485'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LESOES VASCULARES TRAUMATICAS DA REGIAO CERVICAL',
            'sus_code' => '0406020493'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LESOES VASCULARES TRAUMATICAS DE MEMBRO INFERIOR BILATERAL',
            'sus_code' => '0406020507'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LESOES VASCULARES TRAUMATICAS DE MEMBRO INFERIOR UNILATERAL',
            'sus_code' => '0406020515'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LESOES VASCULARES TRAUMATICAS DE MEMBRO SUPERIOR BILATERAL',
            'sus_code' => '0406020523'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LESOES VASCULARES TRAUMATICAS DE MEMBRO SUPERIOR UNILATERAL',
            'sus_code' => '0406020531'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LESOES VASCULARES TRAUMATICAS DO ABDOMEN',
            'sus_code' => '0406020540'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LINFEDEMA ',
            'sus_code' => '0406020558'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE VARIZES (BILATERAL)',
            'sus_code' => '0406020566'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE VARIZES (UNILATERAL)',
            'sus_code' => '0406020574'
        ]);


        Procedure::create([
            'name' => 'TROCA DE AORTA DESCENDENTE (INCLUI ABDOMINAL)',
            'sus_code' => '0406020582'
        ]);


        Procedure::create([
            'name' => 'TROMBECTOMIA DO SISTEMA VENOSO',
            'sus_code' => '0406020590'
        ]);


        Procedure::create([
            'name' => 'VALVULOPLASTIAS DO SISTEMA VENOSO PROFUNDO',
            'sus_code' => '0406020604'
        ]);


        Procedure::create([
            'name' => 'IMPLANTAÇÃO DE CATETER DE LONGA PERMANÊNCIA SEMI OU TOTALMENTE IMPLANTAVEL (Procedure ESPECIAL)',
            'sus_code' => '0406020612'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CATETER DE LONGA PERMANÊNCIA SEMI OU TOTALMENTE IMPLANTÁVEL ',
            'sus_code' => '0406020620'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA CORONARIANA ',
            'sus_code' => '0406030014'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA CORONARIANA C/ IMPLANTE DE DOIS STENTS',
            'sus_code' => '0406030022'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA CORONARIANA C/ IMPLANTE DE STENT',
            'sus_code' => '0406030030'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA CORONARIANA PRIMÁRIA ',
            'sus_code' => '0406030049'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA COM IMPLANTE DE DUPLO STENT EM AORTA/ARTERIA PULMONAR E RAMOS',
            'sus_code' => '0406030057'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA EM ENXERTO CORONARIANO',
            'sus_code' => '0406030065'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA EM ENXERTO CORONARIANO (C/ IMPLANTE DE stent)',
            'sus_code' => '0406030073'
        ]);


        Procedure::create([
            'name' => 'ATRIOSEPTOSTOMIA C/ CATETER BALAO ',
            'sus_code' => '0406030081'
        ]);


        Procedure::create([
            'name' => 'FECHAMENTO PERCUTANEO DO CANAL ARTERIAL / FISTULAS ARTERIOVENOSAS C/ LIBERACAO DE COILS',
            'sus_code' => '0406030090'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO DE SISTEMA CARDIOVASCULAR POR TECNICAS HEMODINAMICAS',
            'sus_code' => '0406030103'
        ]);


        Procedure::create([
            'name' => 'VALVULOPLASTIA AORTICA PERCUTANEA ',
            'sus_code' => '0406030111'
        ]);


        Procedure::create([
            'name' => 'VALVULOPLASTIA MITRAL PERCUTANEA',
            'sus_code' => '0406030120'
        ]);


        Procedure::create([
            'name' => 'VALVULOPLASTIA PULMONAR PERCUTANEA',
            'sus_code' => '0406030138'
        ]);


        Procedure::create([
            'name' => 'VALVULOPLASTIA TRICUSPIDE PERCUTANEA',
            'sus_code' => '0406030146'
        ]);


        Procedure::create([
            'name' => 'ALCOOLIZACAO PERCUTANEA DE HEMANGIOMA E MALFORMACAO VENOSAS (INCLUI ESTUDO ANGIOGRAFICO)',
            'sus_code' => '0406040010'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA INTRALUMINAL DE AORTA, VEIA CAVA / VASOS ILIACOS (C/ STENT)',
            'sus_code' => '0406040028'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA INTRALUMINAL DE AORTA, VEIA CAVA / VASOS ILIACOS (S/ STENT)',
            'sus_code' => '0406040044'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA INTRALUMINAL DE VASOS DAS EXTREMIDADES (SEM STENT)',
            'sus_code' => '0406040052'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA INTRALUMINAL DE VASOS DAS EXTREMIDADES (C/ STENT NAO RECOBERTO) ',
            'sus_code' => '0406040060'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA INTRALUMINAL DE VASOS DAS EXTREMIDADES (C/ STENT RECOBERTO)',
            'sus_code' => '0406040079'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA INTRALUMINAL DE VASOS DO PESCOCO / TRONCOS SUPRA-AORTICOS (SEM STENT)',
            'sus_code' => '0406040087'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA INTRALUMINAL DE VASOS DO PESCOCO OU TRONCOS SUPRA-AORTICOS (C/ STENT NAO RECOBERTO)',
            'sus_code' => '0406040095'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA INTRALUMINAL DE VASOS VISCERAIS C/ STENT NAO RECOBERTO',
            'sus_code' => '0406040109'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA INTRALUMINAL DE VASOS VISCERAIS C/ STENT RECOBERTO',
            'sus_code' => '0406040117'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA INTRALUMINAL DE VASOS VISCERAIS / RENAIS',
            'sus_code' => '0406040125'
        ]);


        Procedure::create([
            'name' => 'ANGIOPLASTIA INTRALUMINAL DOS VASOS DO PESCOCO / TRONCOS SUPRA-AORTICOS (C/ STENT RECOBERTO)',
            'sus_code' => '0406040133'
        ]);


        Procedure::create([
            'name' => 'COLOCACAO PERCUTANEA DE FILTRO DE VEIA CAVA (NA TROMBOSE VENOSA PERIFERICA E EMBOLIA PULMONAR)',
            'sus_code' => '0406040141'
        ]);


        Procedure::create([
            'name' => 'CORRECAO ENDOVASCULAR DE ANEURISMA / DISSECCAO DA AORTA ABDOMINAL C/ ENDOPROTESE RETA / CONICA',
            'sus_code' => '0406040150'
        ]);


        Procedure::create([
            'name' => 'CORRECAO ENDOVASCULAR DE ANEURISMA / DISSECCAO DA AORTA ABDOMINAL E ILIACAS C/ ENDOPROTESE BIFURCADA',
            'sus_code' => '0406040168'
        ]);


        Procedure::create([
            'name' => 'CORRECAO ENDOVASCULAR DE ANEURISMA / DISSECCAO DA AORTA TORACICA C/ ENDOPROTESE RETA OU CONICA',
            'sus_code' => '0406040176'
        ]);


        Procedure::create([
            'name' => 'CORRECAO ENDOVASCULAR DE ANEURISMA / DISSECCAO DAS ILIACAS C/ ENDOPROTESE TUBULAR',
            'sus_code' => '0406040184'
        ]);


        Procedure::create([
            'name' => 'EMBOLIZACAO ARTERIAL DE HEMORRAGIA DIGESTIVA (INCLUI Procedure ENDOSCOPICO E/OU ESTUDO ANGIOGRAFICO)',
            'sus_code' => '0406040192'
        ]);


        Procedure::create([
            'name' => 'EMBOLIZACAO DE MALFORMACAO VASCULAR ARTERIO-VENOSA (INCLUI ESTUDO ANGIOGRAFICO)',
            'sus_code' => '0406040206'
        ]);


        Procedure::create([
            'name' => 'EMBOLIZACAO DE MALFORMACAO VASCULAR POR PUNCAO DIRETA (INCLUI DROGAS EMBOLIZANTES)',
            'sus_code' => '0406040214'
        ]);


        Procedure::create([
            'name' => 'FECHAMENTO PERCUTANEO DE FISTULAS ARTERIOVENOSAS C/ LIBERACAO DE COILS',
            'sus_code' => '0406040222'
        ]);


        Procedure::create([
            'name' => 'FIBRINOLISE INTRAVASCULAR POR CATETER (INCLUI FIBRINOLÍTICO)',
            'sus_code' => '0406040230'
        ]);


        Procedure::create([
            'name' => 'FIBRINOLISE P/ EMBOLIA PULMONAR MACICA INTRAVASCULAR POR CATETER (INCLUI FIBRINOLITICO)',
            'sus_code' => '0406040249'
        ]);


        Procedure::create([
            'name' => 'FIBRINOLISE VISCERAL INTRAVASCULAR POR CATETER (INCLUI FIBRINOLITICO)',
            'sus_code' => '0406040257'
        ]);


        Procedure::create([
            'name' => 'IMPLANTACAO DE SHUNT INTRA-HEPATICO PORTO-SISTEMICO (TIPS) C/ STENT NAO RECOBERTO',
            'sus_code' => '0406040265'
        ]);


        Procedure::create([
            'name' => 'OCLUSAO PERCUTANEA ENDOVASCULAR DE ARTERIA / VEIA',
            'sus_code' => '0406040273'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO DA BIFURCACAO AORTO-ILIACA C/ ANGIOPLASTIA E STENTS',
            'sus_code' => '0406040281'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE EPISTAXE POR EMBOLIZACAO (INCLUI ESTUDO ANGIOGRAFICO E/OU ENDOSCOPICO)',
            'sus_code' => '0406040290'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE HEMATURIA OU SANGRAMENTO GENITAL POR EMBOLIZACAO (INCLUI ESTUDO ANGIOGRAFICO E/OU ENDOSCOPICO)',
            'sus_code' => '0406040303'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE HEMOPTISE POR EMBOLIZACAO PERCUTANEA (INCLUI ESTUDO ANGIOGRAFICO)',
            'sus_code' => '0406040311'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO ENDOVASCULAR DE FISTULAS ARTERIOVENOSAS',
            'sus_code' => '0406040320'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO ENDOVASCULAR DO PSEUDOANEURISMA',
            'sus_code' => '0406040338'
        ]);


        Procedure::create([
            'name' => 'ESTUDO ELETROFISIOLOGICO DIAGNOSTICO',
            'sus_code' => '0406050015'
        ]);


        Procedure::create([
            'name' => 'ESTUDO ELETROFISIOLOGICO TERAPEUTICO I (ABLACAO DE FLUTTER ATRIAL)',
            'sus_code' => '0406050023'
        ]);


        Procedure::create([
            'name' => 'ESTUDO ELETROFISIOLOGICO TERAPEUTICO I (ABLACAO DE TAQUICARDIA ATRIAL DIREITA) ',
            'sus_code' => '0406050031'
        ]);


        Procedure::create([
            'name' => 'ESTUDO ELETROFISIOLOGICO TERAPEUTICO I',
            'sus_code' => '0406050040'
        ]);


        Procedure::create([
            'name' => 'ESTUDO ELETROFISIOLOGICO TERAPEUTICO I (ABLACAO DO NODULO ARCHOV-TAWARA)',
            'sus_code' => '0406050058'
        ]);


        Procedure::create([
            'name' => 'ESTUDO ELETROFISIOLOGICO TERAPEUTICO II (ABLACAO DAS VIAS ANOMALAS MULTIPLAS)',
            'sus_code' => '0406050066'
        ]);


        Procedure::create([
            'name' => 'ESTUDO ELETROFISIOLOGICO TERAPEUTICO II (ABLACAO DE FIBRILACAO ATRIAL)',
            'sus_code' => '0406050074'
        ]);


        Procedure::create([
            'name' => 'ESTUDO ELETROFISIOLOGICO TERAPEUTICO II (ABLACAO DE TAQUICARDIA ATRIAL CICATRICIAL)',
            'sus_code' => '0406050082'
        ]);


        Procedure::create([
            'name' => 'ESTUDO ELETROFISIOLOGICO TERAPEUTICO II (ABLACAO DE TAQUICARDIA ATRIAL CICATRICIAL)',
            'sus_code' => '0406050090'
        ]);


        Procedure::create([
            'name' => 'ESTUDO ELETROFISIOLOGICO TERAPEUTICO II (ABLACAO DE TAQUICARDIA ATRIAL ESQUERDA) ',
            'sus_code' => '0406050104'
        ]);


        Procedure::create([
            'name' => 'ESTUDO ELETROFISIOLOGICO TERAPEUTICO II (ABLACAO DE TAQUICARDIA VENTRICULAR IDIOPATICA DO SEIO DE VALSALVA ESQUERDO)',
            'sus_code' => '0406050112'
        ]);


        Procedure::create([
            'name' => 'ESTUDO ELETROFISIOLOGICO TERAPEUTICO II (ABLACAO DE TAQUICARDIA VENTRICULAR SUSTENTADA C/ CARDIOPATIA ESTRUTURAL)',
            'sus_code' => '0406050120'
        ]);


        Procedure::create([
            'name' => 'ESTUDO ELETROFISIOLOGICO TERAPEUTICO II (ABLACAO DE VIAS ANOMALAS ESQUERDAS) ',
            'sus_code' => '0406050139'
        ]);


        Procedure::create([
            'name' => 'DEGASTROGASTRECTOMIA C/ OU S/ VAGOTOMIA',
            'sus_code' => '0407010017'
        ]);


        Procedure::create([
            'name' => 'DILATACAO ESOFAGICA / PILORICA',
            'sus_code' => '0407010025'
        ]);


        Procedure::create([
            'name' => 'ESOFAGECTOMIA DISTAL C/ TORACOTOMIA',
            'sus_code' => '0407010033'
        ]);


        Procedure::create([
            'name' => 'ESOFAGECTOMIA DISTAL S/ TORACOTOMIA',
            'sus_code' => '0407010041'
        ]);


        Procedure::create([
            'name' => 'ESOFAGECTOMIA VIDEOLAPAROSCOPICA',
            'sus_code' => '0407010050'
        ]);


        Procedure::create([
            'name' => 'ESOFAGO-COLONPLASTIA',
            'sus_code' => '0407010068'
        ]);


        Procedure::create([
            'name' => 'ESOFAGOGASTRECTOMIA',
            'sus_code' => '0407010076'
        ]);


        Procedure::create([
            'name' => 'ESOFAGOPLASTIA / GASTROPLASTIA',
            'sus_code' => '0407010084'
        ]);


        Procedure::create([
            'name' => 'ESOFAGORRAFIA CERVICAL',
            'sus_code' => '0407010092'
        ]);


        Procedure::create([
            'name' => 'ESOFAGORRAFIA TORACICA',
            'sus_code' => '0407010106'
        ]);


        Procedure::create([
            'name' => 'ESOFAGOSTOMIA',
            'sus_code' => '0407010114'
        ]);


        Procedure::create([
            'name' => 'GASTRECTOMIA C/ OU S/ DESVIO DUODENAL',
            'sus_code' => '0407010122'
        ]);


        Procedure::create([
            'name' => 'GASTRECTOMIA PARCIAL C/ OU S/ VAGOTOMIA',
            'sus_code' => '0407010130'
        ]);


        Procedure::create([
            'name' => 'GASTRECTOMIA TOTAL',
            'sus_code' => '0407010149'
        ]);


        Procedure::create([
            'name' => 'GASTRECTOMIA VIDEOLAPAROSCOPICA ',
            'sus_code' => '0407010157'
        ]);


        Procedure::create([
            'name' => 'GASTROENTEROANASTOMOSE',
            'sus_code' => '0407010165'
        ]);


        Procedure::create([
            'name' => 'GASTROPLASTIA C/ DERIVACAO INTESTINAL',
            'sus_code' => '0407010173'
        ]);


        Procedure::create([
            'name' => 'GASTROPLASTIA VERTICAL COM BANDA',
            'sus_code' => '0407010181'
        ]);


        Procedure::create([
            'name' => 'GASTRORRAFIA',
            'sus_code' => '0407010190'
        ]);


        Procedure::create([
            'name' => 'GASTRORRAFIA VIDEOLAPAROSCOPICA ',
            'sus_code' => '0407010203'
        ]);


        Procedure::create([
            'name' => 'GASTROSTOMIA',
            'sus_code' => '0407010211'
        ]);


        Procedure::create([
            'name' => 'GASTROSTOMIA VIDEOLAPAROSCOPICA ',
            'sus_code' => '0407010220'
        ]);


        Procedure::create([
            'name' => 'PILOROPLASTIA',
            'sus_code' => '0407010238'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO DO TUBO DIGESTIVO POR ENDOSCOPIA',
            'sus_code' => '0407010246'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE POLIPO DO TUBO DIGESTIVO POR ENDOSCOPIA',
            'sus_code' => '0407010254'
        ]);


        Procedure::create([
            'name' => 'TAMPONAMENTO DE LESOES HEMORRAGICAS DO APARELHO DIGESTIVO',
            'sus_code' => '0407010262'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE ACALASIA (CARDIOMIOPLASTIA)',
            'sus_code' => '0407010270'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE DIVERTICULO DO TUBO DIGESTIVO',
            'sus_code' => '0407010289'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE REFLUXO GASTROESOFAGICO',
            'sus_code' => '0407010297'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE VARIZES ESOFAGICAS',
            'sus_code' => '0407010300'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO ESCLEROSANTE / LIGADURA ELASTICA DE LESAO HEMORRAGICA DO APARELHO DIGESTIVO',
            'sus_code' => '0407010319'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO ESCLEROSANTE DE LESOES NAO HEMORRAGICAS DO APARELHO DIGESTIVO INCLUINDO LIGADURA ELASTICA',
            'sus_code' => '0407010327'
        ]);

        Procedure::create([
            'name' => 'TRATAMETO CIRURGICO DE MEGAESOFAGO SEM RESSECCAO / CONSERVADOR',
            'sus_code' => '0407010335'
        ]);


        Procedure::create([
            'name' => 'VAGOTOMIA C/ OPERACAO DE DRENAGEM ',
            'sus_code' => '0407010343'
        ]);


        Procedure::create([
            'name' => 'VAGOTOMIA SUPERSELETIVA / GASTRICA PROXIMAL',
            'sus_code' => '0407010351'
        ]);


        Procedure::create([
            'name' => 'GASTRECTOMIA VERTICAL EM MANGA (SLEEVE)',
            'sus_code' => '0407010360'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE INTERCORRENCIAS CIRURGICA POS- CIRURGIA BARIÁTRICA',
            'sus_code' => '0407010378'
        ]);


        Procedure::create([
            'name' => 'CIRURGIA BARIÁTRICA POR VIDEOLAPAROSCOPIA',
            'sus_code' => '0407010386'
        ]);


        Procedure::create([
            'name' => 'AMPUTACAO COMPLETA ABDOMINO-PERINEAL DO RETO',
            'sus_code' => '0407020012'
        ]);


        Procedure::create([
            'name' => 'AMPUTACAO POR PROCIDENCIA DE RETO ',
            'sus_code' => '0407020020'
        ]);


        Procedure::create([
            'name' => 'APENDICECTOMIA',
            'sus_code' => '0407020039'
        ]);


        Procedure::create([
            'name' => 'APENDICECTOMIA VIDEOLAPAROSCOPICA ',
            'sus_code' => '0407020047'
        ]);


        Procedure::create([
            'name' => 'CERCLAGEM DE ANUS',
            'sus_code' => '0407020055'
        ]);


        Procedure::create([
            'name' => 'COLECTOMIA PARCIAL (HEMICOLECTOMIA)',
            'sus_code' => '0407020063'
        ]);


        Procedure::create([
            'name' => 'COLECTOMIA TOTAL',
            'sus_code' => '0407020071'
        ]);


        Procedure::create([
            'name' => 'COLECTOMIA VIDEOLAPAROSCOPICA ',
            'sus_code' => '0407020080'
        ]);


        Procedure::create([
            'name' => 'COLORRAFIA POR VIA ABDOMINAL',
            'sus_code' => '0407020098'
        ]);


        Procedure::create([
            'name' => 'COLOSTOMIA',
            'sus_code' => '0407020101'
        ]);


        Procedure::create([
            'name' => 'CRIPTECTOMIA UNICA / MULTIPLA ',
            'sus_code' => '0407020110'
        ]);


        Procedure::create([
            'name' => 'DILATACAO DIGITAL / INSTRUMENTAL DO ANUS E/OU RETO',
            'sus_code' => '0407020128'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO ANU-RETAL',
            'sus_code' => '0407020136'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO ISQUIORRETAL ',
            'sus_code' => '0407020144'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE HEMATOMA / ABSCESSO RETRO-RETAL',
            'sus_code' => '0407020152'
        ]);


        Procedure::create([
            'name' => 'ELETROCAUTERIZACAO DE LESAO TRANSPARIETAL DE ANUS',
            'sus_code' => '0407020160'
        ]);


        Procedure::create([
            'name' => 'ENTERECTOMIA',
            'sus_code' => '0407020179'
        ]);


        Procedure::create([
            'name' => 'ENTEROANASTOMOSE (QUALQUER SEGMENTO)',
            'sus_code' => '0407020187'
        ]);


        Procedure::create([
            'name' => 'ENTEROPEXIA (QUALQUER SEGMENTO) ',
            'sus_code' => '0407020195'
        ]);


        Procedure::create([
            'name' => 'ENTEROTOMIA E/OU ENTERORRAFIA C/ SUTURA / RESSECCAO (QUALQUER SEGMENTO) ',
            'sus_code' => '0407020209'
        ]);


        Procedure::create([
            'name' => 'ESFINCTEROTOMIA INTERNA E TRATAMENTO DE FISSURA ANAL',
            'sus_code' => '0407020217'
        ]);


        Procedure::create([
            'name' => 'EXCISAO DE LESAO / TUMOR ANU-RETAL',
            'sus_code' => '0407020225'
        ]);


        Procedure::create([
            'name' => 'EXCISAO DE LESAO INTESTINAL / MESENTERICA LOCALIZADA',
            'sus_code' => '0407020233'
        ]);


        Procedure::create([
            'name' => 'FECHAMENTO DE ENTEROSTOMIA (QUALQUER SEGMENTO)',
            'sus_code' => '0407020241'
        ]);


        Procedure::create([
            'name' => 'FECHAMENTO DE FISTULA DE COLON',
            'sus_code' => '0407020250'
        ]);


        Procedure::create([
            'name' => 'FECHAMENTO DE FISTULA DE RETO ',
            'sus_code' => '0407020268'
        ]);


        Procedure::create([
            'name' => 'FISTULECTOMIA / FISTULOTOMIA ANAL ',
            'sus_code' => '0407020276'
        ]);


        Procedure::create([
            'name' => 'HEMORROIDECTOMIA',
            'sus_code' => '0407020284'
        ]);


        Procedure::create([
            'name' => 'HERNIORRAFIA C/ RESSECCAO INTESTINAL (HERNIA ESTRANGULADA)',
            'sus_code' => '0407020292'
        ]);


        Procedure::create([
            'name' => 'JEJUNOSTOMIA / ILEOSTOMIA',
            'sus_code' => '0407020306'
        ]);


        Procedure::create([
            'name' => 'LIGADURA ELASTICA DE HEMORROIDAS (SESSAO)',
            'sus_code' => '0407020314'
        ]);


        Procedure::create([
            'name' => 'PLASTICA ANAL EXTERNA / ESFINCTEROPLASTIA ANAL',
            'sus_code' => '0407020322'
        ]);


        Procedure::create([
            'name' => 'PROCTOCOLECTOMIA TOTAL C/ RESERVATORIO ILEAL',
            'sus_code' => '0407020330'
        ]);


        Procedure::create([
            'name' => 'PROCTOPEXIA ABDOMINAL POR PROCIDENCIA DO RETO',
            'sus_code' => '0407020349'
        ]);


        Procedure::create([
            'name' => 'PROCTOPLASTIA E PROCTORRAFIA POR VIA PERINEAL',
            'sus_code' => '0407020357'
        ]);


        Procedure::create([
            'name' => 'REDUCAO CIRURGICA DE VOLVO POR LAPAROTOMIA',
            'sus_code' => '0407020365'
        ]);


        Procedure::create([
            'name' => 'REDUCAO MANUAL DE PROCIDENCIA DE RETO',
            'sus_code' => '0407020373'
        ]);


        Procedure::create([
            'name' => 'REMOCAO CIRURGICA DE FECALOMA ',
            'sus_code' => '0407020381'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO / POLIPOS DO RETO / COLO SIGMOIDE',
            'sus_code' => '0407020390'
        ]);


        Procedure::create([
            'name' => 'RETOSSIGMOIDECTOMIA ABDOMINAL ',
            'sus_code' => '0407020403'
        ]);


        Procedure::create([
            'name' => 'RETOSSIGMOIDECTOMIA ABDOMINO-PERINEAL',
            'sus_code' => '0407020411'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE ANOMALIAS CONGENITAS DO ANUS E RETO',
            'sus_code' => '0407020420'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE AUSENCIA DO RETO (ABDOMINO-PERINEAL)',
            'sus_code' => '0407020438'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE ILEO MECONIAL',
            'sus_code' => '0407020446'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE IMPERFURACAO MEMBRANOSA DO ANUS ',
            'sus_code' => '0407020454'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE MA ROTACAO INTESTINAL',
            'sus_code' => '0407020462'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE PROLAPSO ANAL',
            'sus_code' => '0407020470'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE PRURIDO ANAL',
            'sus_code' => '0407020489'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO ESCLEROSANTE DE HEMORROIDAS (POR SESSAO)',
            'sus_code' => '0407020497'
        ]);


        Procedure::create([
            'name' => 'ANASTOMOSE BILEO-DIGESTIVA',
            'sus_code' => '0407030018'
        ]);


        Procedure::create([
            'name' => 'COLECISTECTOMIA',
            'sus_code' => '0407030026'
        ]);


        Procedure::create([
            'name' => 'COLECISTECTOMIA VIDEOLAPAROSCOPICA',
            'sus_code' => '0407030034'
        ]);


        Procedure::create([
            'name' => 'COLECISTOSTOMIA',
            'sus_code' => '0407030042'
        ]);


        Procedure::create([
            'name' => 'COLEDOCOPLASTIA',
            'sus_code' => '0407030050'
        ]);


        Procedure::create([
            'name' => 'COLEDOCOTOMIA C/ OU S/ COLECISTECTOMIA',
            'sus_code' => '0407030069'
        ]);


        Procedure::create([
            'name' => 'COLEDOCOTOMIA VIDEOLAPAROSCOPICA',
            'sus_code' => '0407030077'
        ]);


        Procedure::create([
            'name' => 'COLOCACAO DE PROTESE BILIAR',
            'sus_code' => '0407030085'
        ]);


        Procedure::create([
            'name' => 'DILATACAO PERCUTANEA DE ESTENOSES E ANASTOMOSES BILIARES',
            'sus_code' => '0407030093'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM BILIAR PERCUTANEA EXTERNA',
            'sus_code' => '0407030107'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM BILIAR PERCUTANEA INTERNA',
            'sus_code' => '0407030115'
        ]);


        Procedure::create([
            'name' => 'ESPLENECTOMIA',
            'sus_code' => '0407030123'
        ]);


        Procedure::create([
            'name' => 'HEPATECTOMIA PARCIAL',
            'sus_code' => '0407030131'
        ]);


        Procedure::create([
            'name' => 'HEPATORRAFIA',
            'sus_code' => '0407030140'
        ]);


        Procedure::create([
            'name' => 'HEPATORRAFIA COMPLEXA C/ LESAO DE ESTRUTURAS VASCULARES BILIARES',
            'sus_code' => '0407030158'
        ]);


        Procedure::create([
            'name' => 'HEPATOTOMIA E DRENAGEM DE ABSCESSO / CISTO',
            'sus_code' => '0407030166'
        ]);


        Procedure::create([
            'name' => 'MARSUPIALIZACAO DE ABSCESSO / CISTO',
            'sus_code' => '0407030174'
        ]);


        Procedure::create([
            'name' => 'PANCREATECTOMIA PARCIAL',
            'sus_code' => '0407030182'
        ]);


        Procedure::create([
            'name' => 'PANCREATECTOMIA VIDEOLAPAROSCOPICA',
            'sus_code' => '0407030190'
        ]);


        Procedure::create([
            'name' => 'PANCREATO-DUODENECTOMIA',
            'sus_code' => '0407030204'
        ]);


        Procedure::create([
            'name' => 'PANCREATO-ENTEROSTOMIA',
            'sus_code' => '0407030212'
        ]);


        Procedure::create([
            'name' => 'PANCREATOTOMIA P/ DRENAGEM',
            'sus_code' => '0407030220'
        ]);


        Procedure::create([
            'name' => 'RETIRADA PERCUTANEA DE CALCULOS BILIARES',
            'sus_code' => '0407030239'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE CISTOS PANCREATICOS',
            'sus_code' => '0407030247'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO PELVICO',
            'sus_code' => '0407040013'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO SUBFRENICO ',
            'sus_code' => '0407040021'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE HEMATOMA / ABSCESSO PRE-PERITONEAL',
            'sus_code' => '0407040030'
        ]);


        Procedure::create([
            'name' => 'HERNIOPLASTIA DIAFRAGMATICA (VIA ABDOMINAL)',
            'sus_code' => '0407040048'
        ]);


        Procedure::create([
            'name' => 'HERNIOPLASTIA DIAFRAGMATICA (VIA TORACICA)',
            'sus_code' => '0407040056'
        ]);


        Procedure::create([
            'name' => 'HERNIOPLASTIA EPIGASTRICA',
            'sus_code' => '0407040064'
        ]);


        Procedure::create([
            'name' => 'HERNIOPLASTIA EPIGASTRICA VIDEOLAPAROSCOPICA',
            'sus_code' => '0407040072'
        ]);


        Procedure::create([
            'name' => 'HERNIOPLASTIA INCISIONAL ',
            'sus_code' => '0407040080'
        ]);


        Procedure::create([
            'name' => 'HERNIOPLASTIA INGUINAL (BILATERAL)',
            'sus_code' => '0407040099'
        ]);


        Procedure::create([
            'name' => 'HERNIOPLASTIA INGUINAL / CRURAL (UNILATERAL)',
            'sus_code' => '0407040102'
        ]);


        Procedure::create([
            'name' => 'HERNIOPLASTIA RECIDIVANTE',
            'sus_code' => '0407040110'
        ]);


        Procedure::create([
            'name' => 'HERNIOPLASTIA UMBILICAL',
            'sus_code' => '0407040129'
        ]);


        Procedure::create([
            'name' => 'HERNIORRAFIA INGUINAL VIDEOLAPAROSCOPICA',
            'sus_code' => '0407040137'
        ]);


        Procedure::create([
            'name' => 'HERNIORRAFIA S/ RESSECCAO INTESTINAL (HERNIA ESTRANGULADA )',
            'sus_code' => '0407040145'
        ]);


        Procedure::create([
            'name' => 'HERNIORRAFIA UMBILICAL VIDEOLAPAROSCOPICA',
            'sus_code' => '0407040153'
        ]);


        Procedure::create([
            'name' => 'LAPAROTOMIA EXPLORADORA',
            'sus_code' => '0407040161'
        ]);


        Procedure::create([
            'name' => 'LAPAROTOMIA VIDEOLAPAROSCOPICA PARA DRENAGEM E/OU BIOPSIA',
            'sus_code' => '0407040170'
        ]);


        Procedure::create([
            'name' => 'LIBERACAO DE ADERENCIAS INTESTINAIS',
            'sus_code' => '0407040188'
        ]);


        Procedure::create([
            'name' => 'PARACENTESE ABDOMINAL',
            'sus_code' => '0407040196'
        ]);


        Procedure::create([
            'name' => 'PERITONIOSTOMIA C/ TELA INORGANICA',
            'sus_code' => '0407040200'
        ]);


        Procedure::create([
            'name' => 'PNEUMOPERITONIO (POR SESSAO)',
            'sus_code' => '0407040218'
        ]);


        Procedure::create([
            'name' => 'REPARACAO DE OUTRAS HERNIAS',
            'sus_code' => '0407040226'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DO EPIPLOM',
            'sus_code' => '0407040234'
        ]);


        Procedure::create([
            'name' => 'RESSUTURA DE PAREDE ABDOMINAL (POR DEISCENCIA TOTAL / EVISCERACAO)',
            'sus_code' => '0407040242'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE PERITONITE',
            'sus_code' => '0407040250'
        ]);


        Procedure::create([
            'name' => 'VAGOTOMIA VIDEOLAPAROSCOPICA',
            'sus_code' => '0407040269'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE DE GRANDES ARTICULAÇÕES ESCAPULO-TORÁCICAS',
            'sus_code' => '0408010010'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE DE GRANDES ARTICULAÇÕES ESCAPULO-UMERAIS',
            'sus_code' => '0408010029'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA ESCAPULO-UMERAL (NÃO CONVENCIONAL)',
            'sus_code' => '0408010037'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA ESCAPULO-UMERAL PARCIAL',
            'sus_code' => '0408010045'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA ESCAPULO-UMERAL TOTAL',
            'sus_code' => '0408010053'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA ESCAPULO-UMERAL TOTAL - REVISÃO / RECONSTRUÇÃO',
            'sus_code' => '0408010061'
        ]);


        Procedure::create([
            'name' => 'DESARTICULACAO DA ARTICULACAO ESCAPULO-UMERAL',
            'sus_code' => '0408010070'
        ]);


        Procedure::create([
            'name' => 'DESARTICULACAO INTERESCAPULO-TORÁCICA',
            'sus_code' => '0408010088'
        ]);


        Procedure::create([
            'name' => 'ESCAPULOPEXIA C/ OU S/ OSTEOTOMIA DA ESCAPULA / RESSECÇÃO BARRA OMO-CERVICAL ',
            'sus_code' => '0408010096'
        ]);


        Procedure::create([
            'name' => 'OSTECTOMIA DA CLAVÍCULA OU DA ESCÁPULA',
            'sus_code' => '0408010100'
        ]);


        Procedure::create([
            'name' => 'OSTEOTOMIA DA CLAVÍCULA OU DA ESCÁPULA',
            'sus_code' => '0408010118'
        ]);


        Procedure::create([
            'name' => 'REDUCAO INCRUENTA DE FRATURA E FRATURA-LUXACAO AO NIVEL DA CINTURA ESCAPULAR ',
            'sus_code' => '0408010126'
        ]);


        Procedure::create([
            'name' => 'REDUCAO INCRUENTA DE LUXAÇÃO OU FRATURA / LUXAÇÃO ESCÁPULO-UMERAL',
            'sus_code' => '0408010134'
        ]);


        Procedure::create([
            'name' => 'REPARO DE ROTURA DO MANGUITO ROTADOR (INCLUI ProcedureS DESCOMPRESSIVOS)',
            'sus_code' => '0408010142'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DA CLAVÍCULA',
            'sus_code' => '0408010150'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FRATURA DO COLO E CAVIDADE GLENOIDE DE ESCAPULA ',
            'sus_code' => '0408010169'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FRATURA DO CORPO DE ESCAPULA',
            'sus_code' => '0408010177'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LUXACAO / FRATURA-LUXACAO ACROMIO-CLAVICULAR',
            'sus_code' => '0408010185'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LUXACAO / FRATURA-LUXACAO ESCAPULO-UMERAL AGUDA ',
            'sus_code' => '0408010193'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LUXACAO / FRATURA-LUXACAO ESTERNO-CLAVICULAR',
            'sus_code' => '0408010207'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LUXACAO RECIDIVANTE / HABITUAL DE ARTICULACAO ESCAPULO-UMERAL',
            'sus_code' => '0408010215'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE RETARDO DE CONSOLIDACAO DA PSEUDARTROSE DE CLAVICULA / ESCAPULA',
            'sus_code' => '0408010223'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DA SÍNDROME DO IMPACTO SUB-ACROMIAL',
            'sus_code' => '0408010231'
        ]);


        Procedure::create([
            'name' => 'AMPUTAÇÃO / DESARTICULAÇÃO DE MÃO E PUNHO',
            'sus_code' => '0408020016'
        ]);


        Procedure::create([
            'name' => 'AMPUTAÇÃO / DESARTICULAÇÃO DE MEMBROS SUPERIORES',
            'sus_code' => '0408020024'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE DE MÉDIAS / GRANDES ARTICULAÇÕES DE MEMBRO SUPERIOR',
            'sus_code' => '0408020032'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA DE ARTICULAÇÃO DA MÃO',
            'sus_code' => '0408020040'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA DE CABEÇA DO RÁDIO ',
            'sus_code' => '0408020059'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA DE PUNHO',
            'sus_code' => '0408020067'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA TOTAL DE COTOVELO',
            'sus_code' => '0408020075'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA TOTAL DE COTOVELO (REVISAO / RECONSTRUCAO) ',
            'sus_code' => '0408020083'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DO OLECRANO E/OU CABEÇA DO RÁDIO',
            'sus_code' => '0408020091'
        ]);


        Procedure::create([
            'name' => 'FASCIOTOMIA DE MEMBROS SUPERIORES ',
            'sus_code' => '0408020105'
        ]);


        Procedure::create([
            'name' => 'INSTALACAO DE TRAÇÃO ESQUELÉTICA DO MEMBRO SUPERIOR',
            'sus_code' => '0408020113'
        ]);


        Procedure::create([
            'name' => 'REALINHAMENTO DE MECANISMO EXTENSOR DOS DEDOS DA MÃO',
            'sus_code' => '0408020121'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUÇÃO CAPSULO-LIGAMENTAR DE COTOVELO PUNHO',
            'sus_code' => '0408020130'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUÇÃO DE POLIA TENDINOSA DOS DEDOS DA MÃO',
            'sus_code' => '0408020148'
        ]);


        Procedure::create([
            'name' => 'REDUÇÃO INCRUENTA DE FRATURA / LESÃO FISARIA DE COTOVELO',
            'sus_code' => '0408020156'
        ]);


        Procedure::create([
            'name' => 'REDUÇAO INCRUENTA DE FRATURA / LESÃO FISARIA DO EXTREMO PROXIMAL DO ÚMERO',
            'sus_code' => '0408020164'
        ]);


        Procedure::create([
            'name' => 'REDUÇÃO INCRUENTA DE FRATURA / LESÃO FISARIA NO PUNHO',
            'sus_code' => '0408020172'
        ]);


        Procedure::create([
            'name' => 'REDUÇÃO INCRUENTA DE FRATURA / LUXAÇÃO DE MONTEGGIA OU DE GALEAZZI',
            'sus_code' => '0408020180'
        ]);


        Procedure::create([
            'name' => 'REDUÇÃO INCRUENTA DE FRATURA DA DIÁFISE DO ÚMERO',
            'sus_code' => '0408020199'
        ]);


        Procedure::create([
            'name' => 'REDUÇÃO INCRUENTA DE FRATURA DIAFISARIA DOS OSSOS DO ANTEBRAÇO',
            'sus_code' => '0408020202'
        ]);


        Procedure::create([
            'name' => 'REDUÇÃO INCRUENTA DE FRATURA DOS METACARPIANOS',
            'sus_code' => '0408020210'
        ]);


        Procedure::create([
            'name' => 'REDUÇÃO INCRUENTA DE LUXAÇÃO / FRATURA-LUXAÇÃO DO COTOVELO',
            'sus_code' => '0408020229'
        ]);


        Procedure::create([
            'name' => 'REDUÇÃO INCRUENTA DE LUXAÇÃO OU FRATURA / LUXACAO NO PUNHO',
            'sus_code' => '0408020245'
        ]);


        Procedure::create([
            'name' => 'REIMPLANTE DO OMBRO ATÉ O TERÇO MÉDIO DO ANTEBRAÇO',
            'sus_code' => '0408020253'
        ]);


        Procedure::create([
            'name' => 'REIMPLANTE DO TERÇO DISTAL DO ANTEBRAÇO ATÉ OS METACARPIANOS',
            'sus_code' => '0408020261'
        ]);


        Procedure::create([
            'name' => 'REIMPLANTE OU REVASCULARIZAÇÃO AO NÍVEL DA MÃO E OUTROS DEDOS (EXCETO POLEGAR) ',
            'sus_code' => '0408020270'
        ]);


        Procedure::create([
            'name' => 'REIMPLANTE OU REVASCULARIZAÇÃO DO POLEGAR',
            'sus_code' => '0408020288'
        ]);


        Procedure::create([
            'name' => 'REVISÃO CIRÚGICA DE COTO DE AMPUTAÇÃO DO MEMBRO SUPERIOR (EXCETO MÃO)',
            'sus_code' => '0408020296'
        ]);


        Procedure::create([
            'name' => 'TENOSINOVECTOMIA EM MEMBRO SUPERIOR',
            'sus_code' => '0408020300'
        ]);


        Procedure::create([
            'name' => 'TRANSPOSIÇÃO DA ULNA PARA O RÁDIO ',
            'sus_code' => '0408020318'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEDO EM GATILHO',
            'sus_code' => '0408020326'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA / LESÃO FISARIA DA EXTREMIDADE PROXIMAL DO UMERO ',
            'sus_code' => '0408020334'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA / LESÃO FISARIA DAS FALANGES DA MÃO (COM FIXAÇÃO)',
            'sus_code' => '0408020342'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA / LESÃO FISARIA DE EPI~CÔNDILO / EPITROCLEA DO ÚMERO',
            'sus_code' => '0408020350'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA / LESÃO FISARIA DO CÔNDILO / TRÓCLEA/APOFISE CORONÓIDE DO ULNA / CABEÇA DO RÁDIO',
            'sus_code' => '0408020369'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA / LESÃO FISARIA DOS METACARPIANOS',
            'sus_code' => '0408020377'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA / LESÃO FISARIA SUPRACONDILIANA DO ÚMERO',
            'sus_code' => '0408020385'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚGICO DE FRATURA DA DIÁFISE DO ÚMERO',
            'sus_code' => '0408020393'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DA EXTREMIDADE / METÁFISE DISTAL DOS OSSOS DO ANTEBRAÇO',
            'sus_code' => '0408020407'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DE EXTREMIDADES / METÁFISE PROXIMAL DOS OSSOS DO ANTEBRAÇO',
            'sus_code' => '0408020415'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DIAFISARIA DE AMBOS OS OSSOS DO ANTEBRAÇO (C/ SINTESE)',
            'sus_code' => '0408020423'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DIAFISARIA ÚNICA DO RÁDIO / DA ULNA',
            'sus_code' => '0408020431'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA LESÃO FISARIA DOS OSSOS DO ANTEBRAÇO',
            'sus_code' => '0408020440'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA-LUXAÇÃO DE GALEAZZI / MONTEGGIA / ESSEX-LOPRESTI ',
            'sus_code' => '0408020458'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURAS DOS OSSOS DO CARPO',
            'sus_code' => '0408020466'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE GIGANTISMO DA MÃO',
            'sus_code' => '0408020474'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LESÃO AGUDA CAPSULO-LIGAMENTAR DO MEMBRO SUPERIOR: COTOVELO / PUNHO',
            'sus_code' => '0408020482'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LESÃO DA MUSCULATURA INTRÍNSECA DA MÃO',
            'sus_code' => '0408020490'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LESÃO EVOLUTIVA FISARIA NO MEMBRO SUPERIOR',
            'sus_code' => '0408020504'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LUXAÇÃO / FRATURA-LUXAÇÃO CARPO-METACARPIANA',
            'sus_code' => '0408020512'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LUXAÇÃO / FRATURA-LUXACAO DOS OSSOS DO CARPO',
            'sus_code' => '0408020520'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LUXAÇÃO / FRATURA-LUXAÇÃO METACARPO-FALANGIANA',
            'sus_code' => '0408020539'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LUXAÇÃO OU FRATURA-LUXAÇÃO DO COTOVELO',
            'sus_code' => '0408020547'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE / RETARDO DE CONSOLIDAÇÃO / PERDA ÓSSEA DA MÃO',
            'sus_code' => '0408020555'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE / RETARDO DE CONSOLIDAÇÃO / PERDA ÓSSEA DO ANTEBRAÇO',
            'sus_code' => '0408020563'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE / RETARDO DE CONSOLIDAÇÃO / PERDA ÓSSEA DO ÚMERO',
            'sus_code' => '0408020571'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE AO NÍVEL DO COTOVELO',
            'sus_code' => '0408020580'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE NA REGIÃO METAFISE-EPIFISARIA DISTAL DO RADIO E ULNA',
            'sus_code' => '0408020598'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDO-RETARDO / CONSOLIDAÇÃO / PERDA ÓSSEA AO ÍIVEL DO CARPO',
            'sus_code' => '0408020601'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE ROTURA / DESINSERÇÃO / ARRANCAMENTO CAPSULO-TENO-LIGAMENTAR NA MÃO',
            'sus_code' => '0408020610'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE SINDACTILIA DA MÃO (POR ESPACO INTERDIGITAL)',
            'sus_code' => '0408020628'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE SINOSTOSE RÁDIO ULNAR',
            'sus_code' => '0408020636'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO P/ CENTRALIZAÇÃO DO PUNHO',
            'sus_code' => '0408020644'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE CERVICAL / CERVICO TORÁCICA POSTERIOR CINCO NIVEIS',
            'sus_code' => '0408030011'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE CERVICAL / CERVICO-TORÁCICA POSTERIOR UM NIVEL',
            'sus_code' => '0408030020'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE CERVICAL / CERVICO-TORÁCICA POSTERIOR DOIS NÍVEIS',
            'sus_code' => '0408030038'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE CERVICAL / CERVICO-TORÁCICA POSTERIOR SEIS NÍVEIS',
            'sus_code' => '0408030046'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE CERVICAL / CERVICO-TORÁCICA POSTERIOR TRES NÍVEIS',
            'sus_code' => '0408030054'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE CERVICAL ANTERIOR TRÊS NIVEIS',
            'sus_code' => '0408030062'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE CERVICAL ANTERIOR DOIS NÍVEIS',
            'sus_code' => '0408030070'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE CERVICAL ANTERIOR C1-C2 VIA TRANS-ORAL / EXTRA-ORAL',
            'sus_code' => '0408030089'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE CERVICAL ANTERIOR CINCO NÍVEIS',
            'sus_code' => '0408030097'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE CERVICAL ANTERIOR QUATRO NÍVEIS',
            'sus_code' => '0408030100'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE CERVICAL ANTERIOR UM NÍVEL',
            'sus_code' => '0408030119'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE CERVICAL POSTERIOR C1-C2',
            'sus_code' => '0408030127'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE INTERSOMATICA VIA POSTERIOR / POSTERO-LATERAL UM NÍVEL',
            'sus_code' => '0408030135'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE INTERSOMATICA VIA POSTERIOR / POSTERO-LATERAL DOIS NÍVEIS',
            'sus_code' => '0408030143'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE INTERSOMATICA VIA POSTERIOR / POSTERO-LATERAL QUATRO NÍVEIS',
            'sus_code' => '0408030151'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE INTERSOMATICA VIA POSTERIOR / POSTERO-LATERAL TRES NÍVEIS',
            'sus_code' => '0408030160'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE OCCIPTO-CERVICAL (C2) POSTERIOR',
            'sus_code' => '0408030178'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE OCCIPTO-CERVICAL (C3)POSTERIOR',
            'sus_code' => '0408030186'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE OCCIPTO-CERVICAL (C4)POSTERIOR',
            'sus_code' => '0408030194'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE OCCIPTO-CERVICAL (C5) POSTERIOR',
            'sus_code' => '0408030208'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE OCCIPTO-CERVICAL (C6)POSTERIOR',
            'sus_code' => '0408030216'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE OCCIPTO-CERVICAL (C7) POSTERIOR',
            'sus_code' => '0408030224'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE TORACO-LOMBO-SACRA ANTERIOR UM NÍVEL',
            'sus_code' => '0408030232'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE TORACO-LOMBO-SACRA ANTERIOR DOIS NIVEIS',
            'sus_code' => '0408030240'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE TORACO-LOMBO-SACRA ANTERIOR, TRES NIVEIS,',
            'sus_code' => '0408030259'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE TORACO-LOMBO-SACRA POSTERIOR UM NÍVEL',
            'sus_code' => '0408030267'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE TORACO-LOMBO-SACRA POSTERIOR TRÊS NIVEIS',
            'sus_code' => '0408030275'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE TORACO-LOMBO-SACRA POSTERIOR CINCO NÍVEIS',
            'sus_code' => '0408030283'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE TORACO-LOMBO-SACRA POSTERIOR, DOIS NÍVEIS,',
            'sus_code' => '0408030291'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE TORACO-LOMBO-SACRA POSTERIOR, QUATRO NÍVEIS,',
            'sus_code' => '0408030305'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE TORACO-LOMBO-SACRA POSTERIOR, SEIS NÍVEIS,',
            'sus_code' => '0408030313'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE TORACO-LOMBO-SACRA POSTERIOR, SETE NIVEIS,',
            'sus_code' => '0408030321'
        ]);


        Procedure::create([
            'name' => 'COSTO-TRANSVERSECTOMIA',
            'sus_code' => '0408030330'
        ]);


        Procedure::create([
            'name' => 'COSTOPLASTIA (3 OU MAIS COSTELAS) ',
            'sus_code' => '0408030348'
        ]);


        Procedure::create([
            'name' => 'DESCOMPRESSÃO DA JUNÇÃO CRANIO-CERVICAL VIA TRANSORAL / RETROFARINGEA',
            'sus_code' => '0408030356'
        ]);


        Procedure::create([
            'name' => 'DESCOMPRESSÃO OSSEA NA JUNÇÃO CRANIO-CERVICAL VIA POSTERIOR',
            'sus_code' => '0408030364'
        ]);


        Procedure::create([
            'name' => 'DESCOMPRESSÃO OSSEA NA JUNÇÃO CRANIO-CERVICAL VIA POSTERIOR C/ DUROPLASTIA',
            'sus_code' => '0408030372'
        ]);


        Procedure::create([
            'name' => 'DISCECTOMIA CERVICAL / LOMBAR / LOMBO-SACRA POR VIA POSTERIOR (1 NÍVEL C/ MICROSCÓPIO)',
            'sus_code' => '0408030380'
        ]);


        Procedure::create([
            'name' => 'DISCECTOMIA CERVICAL / LOMBAR / LOMBO-SACRA POR VIA POSTERIOR (UM NÍVEL)',
            'sus_code' => '0408030399'
        ]);


        Procedure::create([
            'name' => 'DISCECTOMIA CERVICAL / LOMBAR / LOMBO-SACRA POR VIA POSTERIOR (DOIS NÍVEIS)',
            'sus_code' => '0408030402'
        ]);


        Procedure::create([
            'name' => 'DISCECTOMIA CERVICAL / LOMBAR / LOMBO-SACRA POR VIA POSTERIOR (DOIS OU MAIS NÍVEIS C/ MICROSCÓPIO)',
            'sus_code' => '0408030410'
        ]);


        Procedure::create([
            'name' => 'DISCECTOMIA CERVICAL ANTERIOR (ATÉ 2 NÍVEIS C/ MICROSCÓPIO)',
            'sus_code' => '0408030429'
        ]);


        Procedure::create([
            'name' => 'DISCECTOMIA CERVICAL POR VIA ANTERIOR (1 NÍVEL)',
            'sus_code' => '0408030437'
        ]);


        Procedure::create([
            'name' => 'DISCECTOMIA CERVICAL POR VIA ANTERIOR (2 OU MAIS NÍVEIS)',
            'sus_code' => '0408030445'
        ]);


        Procedure::create([
            'name' => 'DISCECTOMIA TORACO-LOMBO-SACRA POR VIA ANTERIOR (C/ 2 OU MAIS NÍVEIS)',
            'sus_code' => '0408030453'
        ]);


        Procedure::create([
            'name' => 'DISCECTOMIA TORACO-LOMBO-SACRA POR VIA ANTERIOR (1 NÍVEL)',
            'sus_code' => '0408030461'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM CIRÚRGICA DO ILIOPSOAS ',
            'sus_code' => '0408030470'
        ]);


        Procedure::create([
            'name' => 'INSTALAÇÃO DE TRAÇÃO CRANIANA ',
            'sus_code' => '0408030488'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE 2 OU MAIS CORPOS VERTEBRAIS CERVICAIS',
            'sus_code' => '0408030500'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE 2 OU MAIS CORPOS VERTEBRAIS TORACO-LOMBO-SACROS',
            'sus_code' => '0408030518'
        ]);


        Procedure::create([
            'name' => 'RESSEÇÃO DE COCCIX',
            'sus_code' => '0408030526'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE ELEMENTO VERTEBRAL POSTERIOR / POSTERO-LATERAL / DISTAL A C2 (MAIS DE 2 SEGMENTOS)',
            'sus_code' => '0408030534'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE ELEMENTO VERTEBRAL POSTERIOR / POSTERO-LATERAL DISTAIL A C2 (AT 2 SEGMENTOS)',
            'sus_code' => '0408030542'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE UM CORPO VERTEBRAL CERVICAL',
            'sus_code' => '0408030550'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE UM CORPO VERTEBRAL TORACO-LOMBO-SACRO',
            'sus_code' => '0408030569'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO DA COLUNA CERVICAL POR VIA ANTERIOR',
            'sus_code' => '0408030577'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO DA COLUNA CERVICAL POR VIA POSTERIOR',
            'sus_code' => '0408030585'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO DA COLUNA TORACO-LOMBO-SACRA POR VIA ANTERIOR',
            'sus_code' => '0408030593'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO DA COLUNA TORACO-LOMBO-SACRA POR VIA POSTERIOR',
            'sus_code' => '0408030607'
        ]);


        Procedure::create([
            'name' => 'REVISÃO DE ARTRODESE / TRATAMENTO CIRÚRGICO DE PSEUDARTOSE DA COLUNA TORACO-LOMBO-SACRA ANTERIOR',
            'sus_code' => '0408030615'
        ]);


        Procedure::create([
            'name' => 'REVISÃO DE ARTRODESE / TRATAMENTO CIRÚRGICO DE PSEUDARTROSE DA COLUNA CERVICAL POSTERIOR',
            'sus_code' => '0408030623'
        ]);


        Procedure::create([
            'name' => 'REVISÃO DE ARTRODESE / TRATAMENTO CIRÚRGICO DE PSEUDARTROSE DA COLUNA TORACO-LOMBO-SACRA POSTERIOR',
            'sus_code' => '0408030631'
        ]);


        Procedure::create([
            'name' => 'REVISÃO DE ARTRODESE TRATAMENTO CIRÚRGICO DE PSEUDOARTORSE DA COLUNA CERVICAL ANTERIOR',
            'sus_code' => '0408030640'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA ANTERO-POSTERIOR NOVE OU MAIS NÍVEIS',
            'sus_code' => '0408030658'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA ANTERIOR OITO NÍVEIS',
            'sus_code' => '0408030666'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA ANTERIOR QUATRO NÍVEIS',
            'sus_code' => '0408030674'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA ANTERIOR CINCO NÍVEIS ',
            'sus_code' => '0408030682'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA ANTERIOR POSTERIOR ATÉ OITO NÍVEIS',
            'sus_code' => '0408030690'
        ]);


        Procedure::create([
            'name' => 'VERTEBROPLASTIA POR DISPOSITIVO GUIADO EM UM NÍVEL',
            'sus_code' => '0408030704'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA ANTERIOR SEIS NÍVEIS',
            'sus_code' => '0408030712'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA ANTERIOR SETE NÍVEIS',
            'sus_code' => '0408030720'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE DEFORMIDADE DA COLUNA VIA POSTERIOR OITO NIVEIS ',
            'sus_code' => '0408030739'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FRATURA NIVEL C1 - C2 POR VIA ANTERIOR (OSTEOSSINTESE) ',
            'sus_code' => '0408030747'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE TORCICOLO CONGENITO',
            'sus_code' => '0408030755'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE DEFORMIDADE DA COLUNA VIA POSTERIOR NOVE NIVEIS ',
            'sus_code' => '0408030763'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DESCOMPRESSIVO AO NIVEL DO DESFILADEIRO TORACICO',
            'sus_code' => '0408030771'
        ]);


        Procedure::create([
            'name' => 'VERTEBROPLASTIA POR DISPOSITIVO GUIADO DOIS NIVEIS',
            'sus_code' => '0408030780'
        ]);


        Procedure::create([
            'name' => 'VERTEBROPLASTIA POR DISPOSITIVO GUIADO TRES NIVEIS',
            'sus_code' => '0408030798'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE DEFORMIDADE DA COLUNA VIA POSTERIOR DOZE NIVEIS OU MAIS',
            'sus_code' => '0408030801'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE DEFORMIDADE DA COLUNA VIA POSTERIOR DEZ NIVEIS',
            'sus_code' => '0408030810'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA POSTERIOR ONZE NÍVEIS ',
            'sus_code' => '0408030828'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA ANTERIOR DOIS NÍVEIS',
            'sus_code' => '0408030836'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA ANTERIOR TRÊS NÍVEIS',
            'sus_code' => '0408030844'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA POSTERIOR CINCO NÍVEIS',
            'sus_code' => '0408030852'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA POSTERIOR SEIS NÍVEIS ',
            'sus_code' => '0408030860'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA POSTERIOR TRÊS NÍVEIS ',
            'sus_code' => '0408030879'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA POSTERIOR QUATRO NÍVEIS',
            'sus_code' => '0408030887'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA POSTERIOR DOIS NIVEIS ',
            'sus_code' => '0408030895'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE DA COLUNA VIA POSTERIOR SETE NÍVEIS ',
            'sus_code' => '0408030909'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE CERVICAL / CERVICO TORÁCICA POSTERIOR QUATRO NÍVEIS',
            'sus_code' => '0408030917'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE COXOFEMORAL',
            'sus_code' => '0408040017'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE DA SÍNFISE PÚBICA',
            'sus_code' => '0408040025'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE DE ARTICULAÇÕES SACROILIACAS',
            'sus_code' => '0408040033'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA DE QUADRIL (NÃO CONVENCIONAL)',
            'sus_code' => '0408040041'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA PARCIAL DE QUADRIL ',
            'sus_code' => '0408040050'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA TOTAL DE CONVERSÃO DO QUADRIL',
            'sus_code' => '0408040068'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA DE REVISÃO OU RECONSTRUÇÃO DO QUADRIL',
            'sus_code' => '0408040076'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA TOTAL PRIMÁRIA DO QUADRIL CIMENTADA',
            'sus_code' => '0408040084'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA TOTAL PRIMARIA DO QUADRIL NÃO CIMENTADA / HÍBRIDA',
            'sus_code' => '0408040092'
        ]);


        Procedure::create([
            'name' => 'DESARTICULAÇÃO COXOFEMORAL',
            'sus_code' => '0408040106'
        ]);


        Procedure::create([
            'name' => 'DESARTICULAÇÃO INTERÍLIO-ABDOMINAL',
            'sus_code' => '0408040114'
        ]);


        Procedure::create([
            'name' => 'EPIFISIODESE DO TROCANTER MAIOR DO FÊMUR',
            'sus_code' => '0408040122'
        ]);


        Procedure::create([
            'name' => 'EPIFISIODESE FEMORAL PROXIMAL IN SITU',
            'sus_code' => '0408040130'
        ]);


        Procedure::create([
            'name' => 'OSTECTOMIA DA PELVE',
            'sus_code' => '0408040149'
        ]);


        Procedure::create([
            'name' => 'OSTEOTOMIA DA PELVE',
            'sus_code' => '0408040157'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUÇÃO OSTEOPLASTICA DO QUADRIL',
            'sus_code' => '0408040165'
        ]);


        Procedure::create([
            'name' => 'REDUÇÃO INCRUENTA C/ MANIPULAÇÃO DE LUXAÇÃO ESPONTANEA / PROGRESSIVA DO QUADRIL COM APLICAÇÃO DE DISPOSITIVOS DE CONTENÇÃO',
            'sus_code' => '0408040173'
        ]);


        Procedure::create([
            'name' => 'REDUÇÃO INCRUENTA DE LUXAÇÃO CONGÊNITA COXOFEMORAL',
            'sus_code' => '0408040181'
        ]);


        Procedure::create([
            'name' => 'REDUÇÃO INCRUENTA DE LUXAÇÃO COXOFEMORAL TRAUMÁTICA / PÓS-ARTROPLASTIA',
            'sus_code' => '0408040190'
        ]);


        Procedure::create([
            'name' => 'REDUÇÃO INCRUENTA DISJUNÇÃO / LUXAÇÃO / FRATURA / FRATURA-LUXAÇÃO AO NÍVEL DO ANEL PÉLVICO',
            'sus_code' => '0408040203'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE ENXERTO AUTÓGENO DE ILÍACO',
            'sus_code' => '0408040211'
        ]);


        Procedure::create([
            'name' => 'REVISÃO CIRÚRGICA DE LUXAÇÃO COXOFEMORAL CONGÊNITA',
            'sus_code' => '0408040220'
        ]);


        Procedure::create([
            'name' => 'TRANSPOSIÇÃO / ALONGAMENTO MIOTENDINOSO DO ILIOPSOAS EM DOENÇA NEUROMUSCULAR ',
            'sus_code' => '0408040238'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DA AVULSÃO DE TUBEROSIDADES / ESPINHAS E CRISTA ILÍACA S/ LESÃO DO ANEL PÉLVICO',
            'sus_code' => '0408040246'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE ASSOCIAÇÃO FRATURA / LUXAÇÃO / FRATURA-LUXAÇÃO / DISJUNÇÃO DO ANEL PÉLVICO',
            'sus_code' => '0408040254'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA / LUXAÇÃO / FRATURA-LUXAÇÃO / DISJUNÇÃO DO ANEL PÉLVICO ANTERO-POSTERIOR',
            'sus_code' => '0408040262'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA / LUXAÇÃO / FRATURA-LUXAÇÃO DO COCCIX',
            'sus_code' => '0408040270'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA / LUXAÇÃO COXOFEMORAL C/ FRATURA DA EPÍFISE FEMORAL',
            'sus_code' => '0408040289'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DO ACETÁBULO',
            'sus_code' => '0408040297'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DO SACRO',
            'sus_code' => '0408040300'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA-LUXAÇÃO DA ARTICULAÇÃO COXOFEMORAL (DUPLO ACESSO)',
            'sus_code' => '0408040319'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LUXACAO COXO-FEMORAL CONGENITA',
            'sus_code' => '0408040327'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LUXACAO COXO-FEMORAL TRAUMATICA / POS-ARTROPLASTIA',
            'sus_code' => '0408040335'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LUXACAO ESPONTANEA / PROGRESSIVA / PARALITICA DO QUADRIL ',
            'sus_code' => '0408040343'
        ]);


        Procedure::create([
            'name' => 'AMPUTACAO / DESARTICULACAO DE MEMBROS INFERIORES',
            'sus_code' => '0408050012'
        ]);


        Procedure::create([
            'name' => 'AMPUTACAO / DESARTICULACAO DE PE E TARSO',
            'sus_code' => '0408050020'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE DE MEDIAS / GRANDES ARTICULACOES DE MEMBRO INFERIOR',
            'sus_code' => '0408050039'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA DE JOELHO (NAO CONVENCIONAL)',
            'sus_code' => '0408050047'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA TOTAL DE JOELHO - REVISAO / RECONSTRUCAO',
            'sus_code' => '0408050055'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA TOTAL PRIMARIA DO JOELHO',
            'sus_code' => '0408050063'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA UNICOMPARTIMENTAL PRIMARIA DO JOELHO',
            'sus_code' => '0408050071'
        ]);


        Procedure::create([
            'name' => 'FASCIOTOMIA DE MEMBROS INFERIORES ',
            'sus_code' => '0408050080'
        ]);


        Procedure::create([
            'name' => 'INSTALACAO DE TRACAO ESQUELETICA DO MEMBRO INFERIOR',
            'sus_code' => '0408050098'
        ]);


        Procedure::create([
            'name' => 'PATELECTOMIA TOTAL OU PARCIAL ',
            'sus_code' => '0408050101'
        ]);


        Procedure::create([
            'name' => 'QUADRICEPSPLASTIA',
            'sus_code' => '0408050110'
        ]);


        Procedure::create([
            'name' => 'REALINHAMENTO DO MECANISMO EXTENSOR DO JOELHO',
            'sus_code' => '0408050128'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO DE TENDAO PATELAR / TENDAO QUADRICIPITAL',
            'sus_code' => '0408050136'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO LIGAMENTAR DO TORNOZELO',
            'sus_code' => '0408050144'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO LIGAMENTAR EXTRA-ARTICULAR DO JOELHO',
            'sus_code' => '0408050152'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO LIGAMENTAR INTRA-ARTICULAR DO JOELHO (CRUZADO ANTERIOR)',
            'sus_code' => '0408050160'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO LIGAMENTAR INTRA-ARTICULAR DO JOELHO (CRUZADO POSTERIOR C/ OU S/ ANTERIOR)',
            'sus_code' => '0408050179'
        ]);


        Procedure::create([
            'name' => 'REDUCAO INCRUENTA DA LUXACAO / FRATURA-LUXACAO METATARSO-FALANGIANA / INTERFALANGIANA DO PE',
            'sus_code' => '0408050195'
        ]);


        Procedure::create([
            'name' => 'REDUCAO INCRUENTA DE FRATURA / LESAO FISARIA DOS METATARSIANOS',
            'sus_code' => '0408050209'
        ]);


        Procedure::create([
            'name' => 'REDUCAO INCRUENTA DE FRATURA / LUXACAO / FRATURA-LUXACAO DO TORNOZELO',
            'sus_code' => '0408050217'
        ]);


        Procedure::create([
            'name' => 'REDUCAO INCRUENTA DE FRATURA DIAFISARIA / LESAO FISARIA DISTAL DA TIBIA C/ OU S/ FRATURA DA FIBULA',
            'sus_code' => '0408050225'
        ]);


        Procedure::create([
            'name' => 'REDUCAO INCRUENTA DE FRATURA DIAFISARIA / LESAO FISARIA PROXIMAL DO FEMUR',
            'sus_code' => '0408050233'
        ]);


        Procedure::create([
            'name' => 'REDUCAO INCRUENTA DE FRATURA DOS OSSOS DO TARSO',
            'sus_code' => '0408050241'
        ]);


        Procedure::create([
            'name' => 'REDUCAO INCRUENTA DE FRATURA OU LESAO FISARIA DO JOELHO ',
            'sus_code' => '0408050250'
        ]);


        Procedure::create([
            'name' => 'REDUCAO INCRUENTA DE LUXACAO / FRATURA-LUXACAO DO JOELHO',
            'sus_code' => '0408050268'
        ]);


        Procedure::create([
            'name' => 'REDUCAO INCRUENTA DE LUXACAO FEMURO-PATELAR',
            'sus_code' => '0408050276'
        ]);


        Procedure::create([
            'name' => 'REDUCAO INCRUENTA DE LUXACAO OU FRATURA / LUXACAO SUBTALAR E INTRATARSICA',
            'sus_code' => '0408050284'
        ]);


        Procedure::create([
            'name' => 'REDUCAO INCRUENTA DE LUXACAO OU FRATURA / LUXACAO TARSO-METATARSICA',
            'sus_code' => '0408050292'
        ]);


        Procedure::create([
            'name' => 'REIMPLANTE AO NIVEL DA COXA ATE O TERCO PROXIMAL DA PERNA',
            'sus_code' => '0408050306'
        ]);


        Procedure::create([
            'name' => 'REIMPLANTE DO TERCO MEDIO DA PERNA ATE O PE',
            'sus_code' => '0408050314'
        ]);


        Procedure::create([
            'name' => 'REPARO DE BAINHA TENDINOSA AO NIVEL DO TORNOZELO',
            'sus_code' => '0408050322'
        ]);


        Procedure::create([
            'name' => 'REVISAO CIRURGICA DE COTO DE AMPUTACAO EM MEMBRO INFERIOR (EXCETO DEDOS DO PE) ',
            'sus_code' => '0408050330'
        ]);


        Procedure::create([
            'name' => 'REVISAO CIRURGICA DO PE TORTO CONGENITO',
            'sus_code' => '0408050349'
        ]);


        Procedure::create([
            'name' => 'SINDACTILIA CIRURGICA DOS DEDOS DO PE (Procedure TIPO KELIKIAN)',
            'sus_code' => '0408050357'
        ]);


        Procedure::create([
            'name' => 'TALECTOMIA',
            'sus_code' => '0408050365'
        ]);

        Procedure::create([
            'name' => 'TENOSINOVECTOMIA EM MEMBRO INFERIOR',
            'sus_code' => '0408050373'
        ]);


        Procedure::create([
            'name' => 'TRANSFERENCIA DO GRANDE TROCANTER (Procedure ISOLADO)',
            'sus_code' => '0408050381'
        ]);


        Procedure::create([
            'name' => 'TRANSFERENCIA MUSCULAR / TENDINOSA NO MEMBRO INFERIOR',
            'sus_code' => '0408050390'
        ]);


        Procedure::create([
            'name' => 'TRANSPLANTE DE MENISCO',
            'sus_code' => '0408050403'
        ]);


        Procedure::create([
            'name' => 'TRANSPOSICAO DA FIBULA PARA A TIBIA',
            'sus_code' => '0408050411'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DAS DESINSERCOES DAS ESPINHAS INTERCONDILARES / EPICONDILARES',
            'sus_code' => '0408050420'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE AVULSAO DO GRANDE E DO PEQUENO TROCANTER',
            'sus_code' => '0408050438'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE COALIZAO TARSAL',
            'sus_code' => '0408050446'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FRATURA / LESAO FISARIA DE OSSOS DO MEDIO-PE',
            'sus_code' => '0408050454'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FRATURA / LESAO FISARIA DOS METATARSIANOS',
            'sus_code' => '0408050462'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FRATURA / LESAO FISARIA DOS PODODACTILOS',
            'sus_code' => '0408050470'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FRATURA / LESAO FISARIA PROXIMAL (COLO) DO FEMUR (SINTESE)',
            'sus_code' => '0408050489'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA BIMALEOLAR / TRIMALEOLAR / DA FRATURA-LUXAÇÃO DO TORNOZELO',
            'sus_code' => '0408050497'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DA DIÁFISE DA TÍBIA',
            'sus_code' => '0408050500'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DA DIÁFISE DO FÊMUR',
            'sus_code' => '0408050519'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DA PATELA POR FIXAÇÃO INTERNA',
            'sus_code' => '0408050527'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DO CALCÂNEO',
            'sus_code' => '0408050535'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DO PILÃO TIBIAL',
            'sus_code' => '0408050543'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DO PLANALTO TIBIAL',
            'sus_code' => '0408050551'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DO TALUS',
            'sus_code' => '0408050560'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA DO TORNOZELO UNIMALEOLAR',
            'sus_code' => '0408050578'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA INTERCONDILEANA / DOS CÔNDILOS DO FÊMUR ',
            'sus_code' => '0408050586'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA LESÃO FISÁRIA AO NÍVEL DO JOELHO',
            'sus_code' => '0408050594'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA LESÃO FISÁRIA DISTAL DE TÍBIA',
            'sus_code' => '0408050608'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA SUBTROCANTERIANA',
            'sus_code' => '0408050616'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA SUPRACONDILEANA DO FÊMUR (METÁFISE DISTAL)',
            'sus_code' => '0408050624'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA TRANSTROCANTERIANA',
            'sus_code' => '0408050632'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE GIGANTISMO DO PÉ',
            'sus_code' => '0408050640'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE HALUX VALGUS C/ OSTEOTOMIA DO PRIMEIRO OSSO METATARSIANO ',
            'sus_code' => '0408050659'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LESÃO AGUDA CAPSULO-LIGAMENTAR MEMBRO INFERIOR (JOELHO / TORNOZELO)',
            'sus_code' => '0408050667'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LESÃO EVOLUTIVA FISÁRIA NO MEMBRO INFERIOR',
            'sus_code' => '0408050675'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LUXAÇÃO / FRATURA-LUXAÇÃO AO NÍVEL DO JOELHO',
            'sus_code' => '0408050683'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LUXAÇÃO / FRATURA-LUXAÇÃO METATARSO-FALANGIANA / INTER-FALANGIANA',
            'sus_code' => '0408050691'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LUXAÇÃO / FRATURA-LUXAÇÃO SUBTALAR E INTRA-TARSICA',
            'sus_code' => '0408050705'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LUXAÇÃO / FRATURA-LUXAÇÃO TARSO-METATARSICA',
            'sus_code' => '0408050713'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE METATARSO PRIMO VARO',
            'sus_code' => '0408050721'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PÉ CAVO ',
            'sus_code' => '0408050730'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PÉ PLANO VALGO',
            'sus_code' => '0408050748'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PÉ TALO VERTICAL',
            'sus_code' => '0408050756'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PÉ TORTO CONGÊNITO',
            'sus_code' => '0408050764'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PÉ TORTO CONGÊNITO INVETERADO',
            'sus_code' => '0408050772'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE / RETARDO DE CONSOLIDAÇÃO / PERDA ÓSSEA AO NÍVEL DO TARSO',
            'sus_code' => '0408050780'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE / RETARDO DE CONSOLIDAÇÃO / PERDA ÓSSEA DA DIÁFISE DO FÊMUR',
            'sus_code' => '0408050799'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE / RETARDO DE CONSOLIDAÇÃO / PERDA ÓSSEA DA REGIÃO TROCANTERIANA',
            'sus_code' => '0408050802'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE / RETARDO DE CONSOLIDAÇÃO / PERDA ÓSSEA DO COLO DO FÊMUR',
            'sus_code' => '0408050810'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE / RETARDO DE CONSOLIDAÇÃO / PERDA ÓSSEA DO PÉ',
            'sus_code' => '0408050829'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE / RETARDO DE CONSOLIDAÇÃO / PERDA ÓSSEA METÁFISE DISTAL DO FÊMUR',
            'sus_code' => '0408050837'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE / RETARDO DE CONSOLIDAÇÃO AO NÍVEL DO JOELHO',
            'sus_code' => '0408050845'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE CONGÊNITA DA TÍBIA ',
            'sus_code' => '0408050853'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE / RETARDO DE CONSOLIDAÇÃO / PERDA ÓSSEA DA DIÁFISE TIBIAL',
            'sus_code' => '0408050861'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE PSEUDARTROSE / RETARDO DE CONSOLIDAÇÃO/ PERDA ÓSSEA DA METÁFISE TIBIAL',
            'sus_code' => '0408050870'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE ROTURA DE MENISCO COM SUTURA MENISCAL UNI / BICOMPATIMENTAL',
            'sus_code' => '0408050888'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE ROTURA DO MENISCO COM MENISCECTOMIA PARCIAL / TOTAL',
            'sus_code' => '0408050896'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DO HALUX RIGIDUS',
            'sus_code' => '0408050900'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DO HALUX VALGUS S/ OSTEOTOMIA DO PRIMEIRO OSSO METATARSIANO ',
            'sus_code' => '0408050918'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DAS LESÕES OSTEO-CONDRAIS POR FIXAÇÃO OU MOSAICOPLASTIA JOELHO/TORNOZELO',
            'sus_code' => '0408050926'
        ]);


        Procedure::create([
            'name' => 'ALONGAMENTO / ENCURTAMENTO MIOTENDINOSO',
            'sus_code' => '0408060018'
        ]);


        Procedure::create([
            'name' => 'ALONGAMENTO E/OU TRANSPORTE DE OSSOS DA MÃO E/OU DO PÉ',
            'sus_code' => '0408060026'
        ]);


        Procedure::create([
            'name' => 'ALONGAMENTO E/OU TRANSPORTE ÓSSEO DE OSSOS LONGOS (EXCETO DA MÃO E DO PÉ)',
            'sus_code' => '0408060034'
        ]);


        Procedure::create([
            'name' => 'AMPUTAÇÃO / DESARTICULAÇÃO DE DEDO',
            'sus_code' => '0408060042'
        ]);


        Procedure::create([
            'name' => 'ARTRODESE DE PEQUENAS ARTICULAÇÕES',
            'sus_code' => '0408060050'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA DE RESSECÇÃO DE MÉDIA / GRANDE ARTICULAÇÃO ',
            'sus_code' => '0408060069'
        ]);


        Procedure::create([
            'name' => 'ARTROPLASTIA DE RESSECÇÃO DE PEQUENAS ARTICULAÇÕES',
            'sus_code' => '0408060077'
        ]);


        Procedure::create([
            'name' => 'BURSECTOMIA',
            'sus_code' => '0408060085'
        ]);


        Procedure::create([
            'name' => 'DESCOMPRESSÃO COM ESVAZIAMENTO MEDULAR POR BROCAGEM / VIA CORTICOTOMIA',
            'sus_code' => '0408060093'
        ]);


        Procedure::create([
            'name' => 'DIAFISECTOMIA DE OSSOS LONGOS ',
            'sus_code' => '0408060107'
        ]);


        Procedure::create([
            'name' => 'ENCURTAMENTO DE OSSOS LONGOS EXCETO DA MÃO E DO PÉ',
            'sus_code' => '0408060115'
        ]);


        Procedure::create([
            'name' => 'EXPLORAÇÃO ARTICULAR C/ OU S/ SINOVECTOMIA DE MÉDIAS / GRANDES ARTICULAÇÕES',
            'sus_code' => '0408060123'
        ]);


        Procedure::create([
            'name' => 'EXPLORAÇÃO ARTICULAR C/ OU S/ SINOVECTOMIA DE PEQUENAS ARTICULAÇÕES',
            'sus_code' => '0408060131'
        ]);


        Procedure::create([
            'name' => 'FASCIECTOMIA',
            'sus_code' => '0408060140'
        ]);


        Procedure::create([
            'name' => 'MANIPULAÇÃO ARTICULAR',
            'sus_code' => '0408060158'
        ]);


        Procedure::create([
            'name' => 'OSTECTOMIA DE OSSOS DA MÃO E/OU DO PÉ',
            'sus_code' => '0408060166'
        ]);


        Procedure::create([
            'name' => 'OSTECTOMIA DE OSSOS LONGOS EXCETO DA MÃO E DO PÉ',
            'sus_code' => '0408060174'
        ]);


        Procedure::create([
            'name' => 'OSTEOTOMIA DE OSSOS DA MÃO E/OU DO PÉ',
            'sus_code' => '0408060182'
        ]);


        Procedure::create([
            'name' => 'OSTEOTOMIA DE OSSOS LONGOS EXCETO DA MÃO E DO PÉ',
            'sus_code' => '0408060190'
        ]);


        Procedure::create([
            'name' => 'REINSERÇÃO MUSCULAR',
            'sus_code' => '0408060204'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE CISTO SINOVIAL',
            'sus_code' => '0408060212'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE EXOSTOSE',
            'sus_code' => '0408060220'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE TUMOR E RECONSTRUÇÃO C/ RETALHO MICROCIRÚRGICO',
            'sus_code' => '0408060239'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE TUMOR E RECONSTRUÇÃO C/ RETALHO NÃO MICROCIRÚRGICO (EXCETO MÃO E PÉ)',
            'sus_code' => '0408060247'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE TUMOR E RECONSTRUÇÃO C/ TRANSPORTE ÓSSEO',
            'sus_code' => '0408060255'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE TUMOR ÓSSEO C/ SUBSTITUIÇÃO (ENDOPRÓTESE)',
            'sus_code' => '0408060263'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE TUMOR ÓSSEO E RECONSTRUÇÃO C/ ENXERTO',
            'sus_code' => '0408060271'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE TUMOR ÓSSEO E RECONSTRUÇÃO C/ RETALHO NÃO MICROCIRÚRGICO (APENAS MÃO E PÉ)',
            'sus_code' => '0408060280'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE TUMOR ÓSSEO E RECONSTRUÇÃO POR DESLIZAMENTO',
            'sus_code' => '0408060298'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO MUSCULAR',
            'sus_code' => '0408060301'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO SIMPLES DE TUMOR ÓSSEO / DE PARTES MOLES',
            'sus_code' => '0408060310'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO INTRA-ARTICULAR',
            'sus_code' => '0408060328'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO INTRA-ÓSSEO',
            'sus_code' => '0408060336'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE ESPAÇADORES / OUTROS MATERIAIS',
            'sus_code' => '0408060344'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE FIO OU PINO INTRA-ÓSSEO',
            'sus_code' => '0408060352'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE FIXADOR EXTERNO',
            'sus_code' => '0408060360'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE PLACA E/OU PARAFUSOS',
            'sus_code' => '0408060379'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE PRÓTESE DE SUBSTITUIÇÃO DE GRANDES ARTICULAÇÕES (OMBRO / COTOVELO / QUADRIL / JOELHO)',
            'sus_code' => '0408060387'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE PRÓTESE DE SUBSTITUIÇÃO EM PEQUENAS E MÉDIAS ARTICULAÇÕES',
            'sus_code' => '0408060395'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE TRAÇÃO TRANS-ESQUELÉTICA',
            'sus_code' => '0408060409'
        ]);


        Procedure::create([
            'name' => 'RETRAÇÃO CICATRICIAL DOS DEDOS C/ COMPROMETIMENTO TENDINOSO (POR DEDO)',
            'sus_code' => '0408060417'
        ]);


        Procedure::create([
            'name' => 'REVISÃO CIRÚRGICA DE COTO DE AMPUTAÇÃO DOS DEDOS',
            'sus_code' => '0408060425'
        ]);


        Procedure::create([
            'name' => 'TENODESE ',
            'sus_code' => '0408060433'
        ]);


        Procedure::create([
            'name' => 'TENÓLISE ',
            'sus_code' => '0408060441'
        ]);


        Procedure::create([
            'name' => 'TENOMIORRAFIA',
            'sus_code' => '0408060450'
        ]);


        Procedure::create([
            'name' => 'TENOMIOTOMIA / DESINSERÇÃO',
            'sus_code' => '0408060468'
        ]);


        Procedure::create([
            'name' => 'TENOPLASTIA OU ENXERTO DE TENDÃO UNICO',
            'sus_code' => '0408060476'
        ]);


        Procedure::create([
            'name' => 'TENORRAFIA ÚNICA EM TÚNEL OSTEO-FIBROSO',
            'sus_code' => '0408060484'
        ]);


        Procedure::create([
            'name' => 'TRANSPLANTE DO HALUX P/ O POLEGAR ',
            'sus_code' => '0408060492'
        ]);


        Procedure::create([
            'name' => 'TRANSPLANTE DO SEGUNDO PODODÁCTILO P/ POLEGAR / QUALQUER OUTRO DEDO DA MÃO',
            'sus_code' => '0408060506'
        ]);


        Procedure::create([
            'name' => 'TRANSPLANTE MÚSCULO-CUTÂNEO C/ MICRO-ANASTOMOSE NO TRONCO / EXTREMIDADE ',
            'sus_code' => '0408060514'
        ]);


        Procedure::create([
            'name' => 'TRANSPLANTE OSTEO-MÚSCULO-CUTÂNEO C/ MICRO-ANASTOMOSE NO TRONCO OU EXTREMIDADES',
            'sus_code' => '0408060522'
        ]);


        Procedure::create([
            'name' => 'TRANSPOSIÇÃO / TRANSFERÊNCIA MIOTENDINOSA MÚLTIPLA',
            'sus_code' => '0408060530'
        ]);


        Procedure::create([
            'name' => 'TRANSPOSIÇÃO / TRANSFERÊNCIA MIOTENDINOSA ÚNICA',
            'sus_code' => '0408060549'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE ARTRITE INFECCIOSA (GRANDES E MÉDIAS ARTICULAÇÕES)',
            'sus_code' => '0408060557'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE ARTRITE INFECCIOSA DAS PEQUENAS ARTICULAÇÕES',
            'sus_code' => '0408060565'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEDO EM MARTELO / EM GARRA (MÃO E PÉ)',
            'sus_code' => '0408060573'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFORMIDADE ARTICULAR POR RETRACAO TENO-CAPSULO-LIGAMENTAR',
            'sus_code' => '0408060581'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FRATURA VICIOSAMENTE CONSOLIDADA DOS OSSOS LONGOS EXCETO DA MÃO E DO PÉ',
            'sus_code' => '0408060590'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE HERNIA MUSCULAR',
            'sus_code' => '0408060603'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE INFECÇÃO EM ARTROPLASTIA DAS MÉDIAS / PEQUENAS ARTICULAÇÕES',
            'sus_code' => '0408060611'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE INFECÇÃO PÓS-ARTROPLASTIA (GRANDES ARTICULAÇÕES)',
            'sus_code' => '0408060620'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE LUXAÇÃO / FRATURA-LUXAÇÃO METATARSO INTER-FALANGEANA ',
            'sus_code' => '0408060638'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE MÃO OU PÉ EM FENDA / DEDO BÍFIDO / MACRODACTILIA / POLIDACTILIA',
            'sus_code' => '0408060646'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE POLIDACTILIA NÃO ARTICULADA',
            'sus_code' => '0408060654'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE POLIDACTILIA ARTICULADA',
            'sus_code' => '0408060662'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE RETRAÇÃO MUSCULAR',
            'sus_code' => '0408060670'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE RUTURA DO APARELHO EXTENSOR DO DEDO',
            'sus_code' => '0408060689'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE SINDACTILIA COMPLEXA (C/ FUSÃO ÓSSEA)',
            'sus_code' => '0408060697'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE SINDACTILIA SIMPLES (DOIS DEDOS)',
            'sus_code' => '0408060700'
        ]);


        Procedure::create([
            'name' => 'VIDEOARTROSCOPIA',
            'sus_code' => '0408060719'
        ]);


        Procedure::create([
            'name' => 'CAPSULECTOMIA RENAL',
            'sus_code' => '0409010014'
        ]);


        Procedure::create([
            'name' => 'CISTECTOMIA PARCIAL',
            'sus_code' => '0409010022'
        ]);


        Procedure::create([
            'name' => 'CISTECTOMIA TOTAL',
            'sus_code' => '0409010030'
        ]);


        Procedure::create([
            'name' => 'CISTECTOMIA TOTAL E DERIVACAO EM 1 SO TEMPO',
            'sus_code' => '0409010049'
        ]);


        Procedure::create([
            'name' => 'CISTOENTEROPLASTIA',
            'sus_code' => '0409010057'
        ]);


        Procedure::create([
            'name' => 'CISTOLITOTOMIA E/OU RETIRADA DE CORPO ESTRANHO DA BEXIGA',
            'sus_code' => '0409010065'
        ]);


        Procedure::create([
            'name' => 'CISTOPLASTIA (CORRECAO DE EXTROFIA VESICAL)',
            'sus_code' => '0409010073'
        ]);


        Procedure::create([
            'name' => 'CISTORRAFIA',
            'sus_code' => '0409010081'
        ]);


        Procedure::create([
            'name' => 'CISTOSTOMIA',
            'sus_code' => '0409010090'
        ]);


        Procedure::create([
            'name' => 'COLOCACAO PERCUTANEA DE CATETER PIELO-URETERO-VESICAL UNILATERAL',
            'sus_code' => '0409010103'
        ]);


        Procedure::create([
            'name' => 'DILATACAO PERCUTANEA DE ESTENOSES URETERAIS E JUNCAO URETERO-VESICAL',
            'sus_code' => '0409010111'
        ]);


        Procedure::create([
            'name' => 'DIVERTICULECTOMIA VESICAL',
            'sus_code' => '0409010120'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO RENAL / PERI-RENAL',
            'sus_code' => '0409010138'
        ]);


        Procedure::create([
            'name' => 'EXTRACAO ENDOSCOPICA DE CALCULO EM PELVE RENAL',
            'sus_code' => '0409010146'
        ]);


        Procedure::create([
            'name' => 'EXTRACAO ENDOSCOPICA DE CORPO ESTRANHO / CALCULO EM URETER',
            'sus_code' => '0409010154'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE CATETER URETERAL POR TECNICA CISTOSCOPICA',
            'sus_code' => '0409010162'
        ]);


        Procedure::create([
            'name' => 'INSTALACAO ENDOSCOPICA DE CATETER DUPLO J',
            'sus_code' => '0409010170'
        ]);


        Procedure::create([
            'name' => 'LITOTRIPSIA',
            'sus_code' => '0409010189'
        ]);


        Procedure::create([
            'name' => 'LOMBOTOMIA',
            'sus_code' => '0409010197'
        ]);


        Procedure::create([
            'name' => 'NEFRECTOMIA PARCIAL',
            'sus_code' => '0409010200'
        ]);


        Procedure::create([
            'name' => 'NEFRECTOMIA TOTAL',
            'sus_code' => '0409010219'
        ]);


        Procedure::create([
            'name' => 'NEFROLITOTOMIA',
            'sus_code' => '0409010227'
        ]);


        Procedure::create([
            'name' => 'NEFROLITOTOMIA PERCUTANEA',
            'sus_code' => '0409010235'
        ]);


        Procedure::create([
            'name' => 'NEFROPEXIA',
            'sus_code' => '0409010243'
        ]);


        Procedure::create([
            'name' => 'NEFROPIELOSTOMIA',
            'sus_code' => '0409010251'
        ]);


        Procedure::create([
            'name' => 'NEFRORRAFIA',
            'sus_code' => '0409010260'
        ]);


        Procedure::create([
            'name' => 'NEFROSTOMIA (POR PUNCAO) ',
            'sus_code' => '0409010278'
        ]);


        Procedure::create([
            'name' => 'NEFROSTOMIA C/ OU S/ DRENAGEM ',
            'sus_code' => '0409010286'
        ]);


        Procedure::create([
            'name' => 'NEFROSTOMIA PERCUTANEA',
            'sus_code' => '0409010294'
        ]);


        Procedure::create([
            'name' => 'NEFROURETERECTOMIA TOTAL ',
            'sus_code' => '0409010308'
        ]);


        Procedure::create([
            'name' => 'PIELOLITOTOMIA',
            'sus_code' => '0409010316'
        ]);


        Procedure::create([
            'name' => 'PIELOPLASTIA',
            'sus_code' => '0409010324'
        ]);


        Procedure::create([
            'name' => 'PIELOSTOMIA',
            'sus_code' => '0409010332'
        ]);


        Procedure::create([
            'name' => 'PIELOTOMIA',
            'sus_code' => '0409010340'
        ]);


        Procedure::create([
            'name' => 'PUNCAO / ASPIRACAO DA BEXIGA',
            'sus_code' => '0409010359'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DO COLO VESICAL / TUMOR VESICAL A CEU ABERTO',
            'sus_code' => '0409010367'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO ENDOSCOPICA DA EXTREMIDADE DISTAL DO URETER',
            'sus_code' => '0409010375'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO ENDOSCOPICA DE LESAO VESICAL',
            'sus_code' => '0409010383'
        ]);


        Procedure::create([
            'name' => 'RETIRADA PERCUTANEA DE CALCULO URETERAL C/ CATETER',
            'sus_code' => '0409010391'
        ]);


        Procedure::create([
            'name' => 'SINFISIOTOMIA DO RIM EM FERRADURA (NEFROPLASTIA)',
            'sus_code' => '0409010405'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE BEXIGA NEUROGENICA',
            'sus_code' => '0409010413'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE CISTO DE RIM POR PUNCAO',
            'sus_code' => '0409010421'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE CISTOCELE ',
            'sus_code' => '0409010430'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULA VESICO-CUTANEA',
            'sus_code' => '0409010448'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULA VESICO-ENTERICA',
            'sus_code' => '0409010456'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULA VESICO-RETAL',
            'sus_code' => '0409010464'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULAS URETERAIS',
            'sus_code' => '0409010472'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE HEMORRAGIA VESICAL (FORMOLIZACAO DA BEXIGA)',
            'sus_code' => '0409010480'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE INCONTINENCIA URINARIA VIA ABDOMINAL',
            'sus_code' => '0409010499'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE REFLUXO VESICO-URETERAL',
            'sus_code' => '0409010502'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE URETEROCELE',
            'sus_code' => '0409010510'
        ]);


        Procedure::create([
            'name' => 'URETERECTOMIA',
            'sus_code' => '0409010529'
        ]);


        Procedure::create([
            'name' => 'URETEROCISTONEOSTOMIA',
            'sus_code' => '0409010537'
        ]);


        Procedure::create([
            'name' => 'URETEROENTEROPLASTIA',
            'sus_code' => '0409010545'
        ]);


        Procedure::create([
            'name' => 'URETEROENTEROSTOMIA',
            'sus_code' => '0409010553'
        ]);


        Procedure::create([
            'name' => 'URETEROLITOTOMIA',
            'sus_code' => '0409010561'
        ]);


        Procedure::create([
            'name' => 'URETEROPLASTIA',
            'sus_code' => '0409010570'
        ]);


        Procedure::create([
            'name' => 'URETEROSTOMIA CUTANEA',
            'sus_code' => '0409010588'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE COLECAO PERI-URETRAL',
            'sus_code' => '0409020010'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE FLEIMAO URINOSO',
            'sus_code' => '0409020028'
        ]);


        Procedure::create([
            'name' => 'EXTRACAO ENDOSCOPICA DE CORPO ESTRANHO / CALCULO NA URETRA C/ CISTOSCOPIA',
            'sus_code' => '0409020036'
        ]);


        Procedure::create([
            'name' => 'INJECAO DE GORDURA / TEFLON PERI-URETRAL',
            'sus_code' => '0409020044'
        ]);


        Procedure::create([
            'name' => 'LIGADURA / SECCAO DE VASOS ABERRANTES',
            'sus_code' => '0409020052'
        ]);


        Procedure::create([
            'name' => 'MEATOTOMIA ENDOSCOPICA',
            'sus_code' => '0409020060'
        ]);


        Procedure::create([
            'name' => 'MEATOTOMIA SIMPLES',
            'sus_code' => '0409020079'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE CARUNCULA URETRAL',
            'sus_code' => '0409020087'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE PROLAPSO DA MUCOSA DA URETRA',
            'sus_code' => '0409020095'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO E FECHAMENTO DE FISTULA URETRAL',
            'sus_code' => '0409020109'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE INCONTINENCIA URINARIA',
            'sus_code' => '0409020117'
        ]);


        Procedure::create([
            'name' => 'URETROPLASTIA (RESSECCAO DE CORDA)',
            'sus_code' => '0409020125'
        ]);


        Procedure::create([
            'name' => 'URETROPLASTIA AUTOGENA',
            'sus_code' => '0409020133'
        ]);


        Procedure::create([
            'name' => 'URETROPLASTIA HETEROGENEA',
            'sus_code' => '0409020141'
        ]);


        Procedure::create([
            'name' => 'URETRORRAFIA',
            'sus_code' => '0409020150'
        ]);


        Procedure::create([
            'name' => 'URETROSTOMIA PERINEAL / CUTANEA / EXTERNA',
            'sus_code' => '0409020168'
        ]);


        Procedure::create([
            'name' => 'URETROTOMIA INTERNA',
            'sus_code' => '0409020176'
        ]);


        Procedure::create([
            'name' => 'URETROTOMIA P/ RETIRADA DE CALCULO OU CORPO ESTRANHO',
            'sus_code' => '0409020184'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO PROSTATICO ',
            'sus_code' => '0409030015'
        ]);


        Procedure::create([
            'name' => 'PROSTATECTOMIA SUPRAPÚBICA',
            'sus_code' => '0409030023'
        ]);


        Procedure::create([
            'name' => 'PROSTATOVESICULECTOMIA RADICAL',
            'sus_code' => '0409030031'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO ENDOSCOPICA DE PROSTATA ',
            'sus_code' => '0409030040'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO DA BOLSA ESCROTAL',
            'sus_code' => '0409040010'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO DO EPIDIDIMO E/OU CANAL DEFERENTE',
            'sus_code' => '0409040029'
        ]);


        Procedure::create([
            'name' => 'EPIDIDIMECTOMIA',
            'sus_code' => '0409040037'
        ]);


        Procedure::create([
            'name' => 'EPIDIDIMECTOMIA C/ ESVAZIAMENTO GANGLIONAR',
            'sus_code' => '0409040045'
        ]);


        Procedure::create([
            'name' => 'ESPERMATOCELECTOMIA',
            'sus_code' => '0409040053'
        ]);


        Procedure::create([
            'name' => 'EXERESE DE CISTO DE BOLSA ESCROTAL',
            'sus_code' => '0409040061'
        ]);


        Procedure::create([
            'name' => 'EXERESE DE CISTO DE EPIDIDIMO ',
            'sus_code' => '0409040070'
        ]);


        Procedure::create([
            'name' => 'EXERESE DE LESAO DO CORDAO ESPERMATICO',
            'sus_code' => '0409040088'
        ]);


        Procedure::create([
            'name' => 'EXPLORACAO CIRURGICA DA BOLSA ESCROTAL',
            'sus_code' => '0409040096'
        ]);


        Procedure::create([
            'name' => 'EXPLORACAO CIRURGICA DO CANAL DEFERENTE',
            'sus_code' => '0409040100'
        ]);


        Procedure::create([
            'name' => 'NEOSTOMIA DE EPIDIDIMO / CANAL DEFERENTE',
            'sus_code' => '0409040118'
        ]);


        Procedure::create([
            'name' => 'ORQUIDOPEXIA BILATERAL',
            'sus_code' => '0409040126'
        ]);


        Procedure::create([
            'name' => 'ORQUIDOPEXIA UNILATERAL',
            'sus_code' => '0409040134'
        ]);


        Procedure::create([
            'name' => 'ORQUIECTOMIA SUBCAPSULAR BILATERAL',
            'sus_code' => '0409040142'
        ]);


        Procedure::create([
            'name' => 'ORQUIECTOMIA UNI OU BILATERAL C/ ESVAZIAMENTO GANGLIONAR',
            'sus_code' => '0409040150'
        ]);


        Procedure::create([
            'name' => 'ORQUIECTOMIA UNILATERAL',
            'sus_code' => '0409040169'
        ]);


        Procedure::create([
            'name' => 'PLASTICA DA BOLSA ESCROTAL',
            'sus_code' => '0409040177'
        ]);


        Procedure::create([
            'name' => 'REPARACAO E OPERACAO PLASTICA DO TESTICULO',
            'sus_code' => '0409040185'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO PARCIAL DA BOLSA ESCROTAL',
            'sus_code' => '0409040193'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE ELEFANTIASE DA BOLSA ESCROTAL',
            'sus_code' => '0409040207'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE HIDROCELE ',
            'sus_code' => '0409040215'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE TORCAO DO TESTICULO / DO CORDAO ESPERMATICO',
            'sus_code' => '0409040223'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE VARICOCELE',
            'sus_code' => '0409040231'
        ]);


        Procedure::create([
            'name' => 'VASECTOMIA',
            'sus_code' => '0409040240'
        ]);


        Procedure::create([
            'name' => 'AMPUTACAO DE PENIS',
            'sus_code' => '0409050016'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE EPISPADIA',
            'sus_code' => '0409050024'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE HIPOSPADIA (1O TEMPO) ',
            'sus_code' => '0409050032'
        ]);


        Procedure::create([
            'name' => 'CORRECAO DE HIPOSPADIA (2O TEMPO) ',
            'sus_code' => '0409050040'
        ]);


        Procedure::create([
            'name' => 'LIBERACAO / PLASTIA DE PREPUCIO ',
            'sus_code' => '0409050059'
        ]);


        Procedure::create([
            'name' => 'PLASTICA DE FREIO BALANO-PREPUCIAL',
            'sus_code' => '0409050067'
        ]);


        Procedure::create([
            'name' => 'PLASTICA TOTAL DO PENIS',
            'sus_code' => '0409050075'
        ]);


        Procedure::create([
            'name' => 'POSTECTOMIA',
            'sus_code' => '0409050083'
        ]);


        Procedure::create([
            'name' => 'REIMPLANTE DE PENIS',
            'sus_code' => '0409050091'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE ELEFANTIASE DO PENIS',
            'sus_code' => '0409050105'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE PRIAPRISMO',
            'sus_code' => '0409050113'
        ]);


        Procedure::create([
            'name' => 'CIRURGIAS COMPLEMENTARES DE REDESIGNAÇÃO SEXUAL',
            'sus_code' => '0409050130'
        ]);


        Procedure::create([
            'name' => 'REDESIGNAÇÃO SEXUAL NO SEXO MASCULINO',
            'sus_code' => '0409050148'
        ]);


        Procedure::create([
            'name' => 'CERCLAGEM DE COLO DO UTERO',
            'sus_code' => '0409060011'
        ]);


        Procedure::create([
            'name' => 'COLPOPERINEOPLASTIA ANTERIOR E POSTERIOR C/ AMPUTACAO DE COLO',
            'sus_code' => '0409060020'
        ]);


        Procedure::create([
            'name' => 'EXCISÃO TIPO 3 DO COLO UTERINO',
            'sus_code' => '0409060038'
        ]);


        Procedure::create([
            'name' => 'CURETAGEM SEMIOTICA C/ OU S/ DILATACAO DO COLO DO UTERO ',
            'sus_code' => '0409060046'
        ]);


        Procedure::create([
            'name' => 'CURETAGEM UTERINA EM MOLA HIDATIFORME',
            'sus_code' => '0409060054'
        ]);


        Procedure::create([
            'name' => 'DILATACAO DE COLO DO UTERO',
            'sus_code' => '0409060062'
        ]);


        Procedure::create([
            'name' => 'ESVAZIAMENTO DE UTERO POS-ABORTO POR ASPIRACAO MANUAL INTRA-UTERINA (AMIU)',
            'sus_code' => '0409060070'
        ]);


        Procedure::create([
            'name' => 'EXCISÃO TIPO I DO COLO UTERINO',
            'sus_code' => '0409060089'
        ]);


        Procedure::create([
            'name' => 'EXERESE DE POLIPO DE UTERO',
            'sus_code' => '0409060097'
        ]);


        Procedure::create([
            'name' => 'HISTERECTOMIA (POR VIA VAGINAL) ',
            'sus_code' => '0409060100'
        ]);


        Procedure::create([
            'name' => 'HISTERECTOMIA C/ ANEXECTOMIA (UNI / BILATERAL)',
            'sus_code' => '0409060119'
        ]);


        Procedure::create([
            'name' => 'HISTERECTOMIA SUBTOTAL',
            'sus_code' => '0409060127'
        ]);


        Procedure::create([
            'name' => 'HISTERECTOMIA TOTAL',
            'sus_code' => '0409060135'
        ]);


        Procedure::create([
            'name' => 'HISTERECTOMIA TOTAL AMPLIADA (WERTHEIN-MEIGS)',
            'sus_code' => '0409060143'
        ]);


        Procedure::create([
            'name' => 'HISTERECTOMIA VIDEOLAPAROSCOPICA',
            'sus_code' => '0409060151'
        ]);


        Procedure::create([
            'name' => 'HISTERORRAFIA',
            'sus_code' => '0409060160'
        ]);


        Procedure::create([
            'name' => 'HISTEROSCOPIA CIRURGICA C/ RESSECTOSCOPIO',
            'sus_code' => '0409060178'
        ]);


        Procedure::create([
            'name' => 'LAQUEADURA TUBARIA',
            'sus_code' => '0409060186'
        ]);


        Procedure::create([
            'name' => 'MIOMECTOMIA',
            'sus_code' => '0409060194'
        ]);


        Procedure::create([
            'name' => 'MIOMECTOMIA VIDEOLAPAROSCOPICA',
            'sus_code' => '0409060208'
        ]);


        Procedure::create([
            'name' => 'OOFORECTOMIA / OOFOROPLASTIA',
            'sus_code' => '0409060216'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE VARIZES PELVICAS ',
            'sus_code' => '0409060224'
        ]);


        Procedure::create([
            'name' => 'SALPINGECTOMIA UNI / BILATERAL',
            'sus_code' => '0409060232'
        ]);


        Procedure::create([
            'name' => 'SALPINGECTOMIA VIDEOLAPAROSCOPICA ',
            'sus_code' => '0409060240'
        ]);


        Procedure::create([
            'name' => 'SALPINGOPLASTIA',
            'sus_code' => '0409060259'
        ]);


        Procedure::create([
            'name' => 'SALPINGOPLASTIA VIDEOLAPAROSCOPICA',
            'sus_code' => '0409060267'
        ]);


        Procedure::create([
            'name' => 'TRAQUELOPLASTIA',
            'sus_code' => '0409060275'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULA VESICO-UTERINA',
            'sus_code' => '0409060283'
        ]);


        Procedure::create([
            'name' => 'HISTERECTOMIA C/ ANEXECTOMIA BILATERAL E COLPECTOMIA SOB PROCESSO TRANSEXUALIZADOR',
            'sus_code' => '0409060291'
        ]);


        Procedure::create([
            'name' => 'EXCISÃO TIPO 2 DO COLO UTERINO',
            'sus_code' => '0409060305'
        ]);


        Procedure::create([
            'name' => 'ALARGAMENTO DA ENTRADA VAGINAL',
            'sus_code' => '0409070017'
        ]);


        Procedure::create([
            'name' => 'COLPECTOMIA',
            'sus_code' => '0409070025'
        ]);


        Procedure::create([
            'name' => 'COLPOCLEISE (CIRURGIA DE LE FORT) ',
            'sus_code' => '0409070033'
        ]);


        Procedure::create([
            'name' => 'COLPOPERINEOCLEISE',
            'sus_code' => '0409070041'
        ]);


        Procedure::create([
            'name' => 'COLPOPERINEOPLASTIA ANTERIOR E POSTERIOR',
            'sus_code' => '0409070050'
        ]);


        Procedure::create([
            'name' => 'COLPOPERINEOPLASTIA POSTERIOR ',
            'sus_code' => '0409070068'
        ]);


        Procedure::create([
            'name' => 'COLPOPERINEORRAFIA NAO OBSTETRICA ',
            'sus_code' => '0409070076'
        ]);


        Procedure::create([
            'name' => 'COLPOPLASTIA ANTERIOR',
            'sus_code' => '0409070084'
        ]);


        Procedure::create([
            'name' => 'COLPORRAFIA NAO OBSTETRICA',
            'sus_code' => '0409070092'
        ]);


        Procedure::create([
            'name' => 'COLPOTOMIA',
            'sus_code' => '0409070106'
        ]);


        Procedure::create([
            'name' => 'CONSTRUCAO DE VAGINA',
            'sus_code' => '0409070114'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE GLANDULA DE BARTHOLIN / SKENE',
            'sus_code' => '0409070122'
        ]);


        Procedure::create([
            'name' => 'EPISIOPERINEORRAFIA NAO OBSTETRICA',
            'sus_code' => '0409070130'
        ]);


        Procedure::create([
            'name' => 'EXERESE DE CISTO VAGINAL ',
            'sus_code' => '0409070149'
        ]);


        Procedure::create([
            'name' => 'EXERESE DE GLANDULA DE BARTHOLIN / SKENE',
            'sus_code' => '0409070157'
        ]);


        Procedure::create([
            'name' => 'EXTIRPACAO DE LESAO DE VULVA / PERINEO (POR ELETROCOAGULACAO OU FULGURACAO)',
            'sus_code' => '0409070165'
        ]);


        Procedure::create([
            'name' => 'EXTRACAO DE CORPO ESTRANHO DA VAGINA',
            'sus_code' => '0409070173'
        ]);


        Procedure::create([
            'name' => 'HIMENOTOMIA',
            'sus_code' => '0409070181'
        ]);


        Procedure::create([
            'name' => 'MARSUPIALIZACAO DE GLANDULA DE BARTOLIN',
            'sus_code' => '0409070190'
        ]);


        Procedure::create([
            'name' => 'OPERACAO DE BURCH',
            'sus_code' => '0409070203'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO DA VAGINA',
            'sus_code' => '0409070211'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE COAPTACAO DE NINFAS',
            'sus_code' => '0409070220'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULA RETO-VAGINAL',
            'sus_code' => '0409070238'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULA URETRO-VAGINAL',
            'sus_code' => '0409070246'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULA VESICO-VAGINAL',
            'sus_code' => '0409070254'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE HIPERTROFIA DOS PEQUENOS LABIOS ',
            'sus_code' => '0409070262'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE INCONTINENCIA URINARIA POR VIA VAGINAL',
            'sus_code' => '0409070270'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE VAGINA SEPTADA / ATRESICA',
            'sus_code' => '0409070289'
        ]);


        Procedure::create([
            'name' => 'VULVECTOMIA AMPLIADA C/ LINFADENECTOMIA',
            'sus_code' => '0409070297'
        ]);


        Procedure::create([
            'name' => 'VULVECTOMIA SIMPLES',
            'sus_code' => '0409070300'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE ABSCESSO DE MAMA',
            'sus_code' => '0410010014'
        ]);


        Procedure::create([
            'name' => 'ESVAZIAMENTO PERCUTANEO DE CISTO MAMARIO',
            'sus_code' => '0410010022'
        ]);


        Procedure::create([
            'name' => 'EXERESE DE MAMA SUPRANUMERARIA',
            'sus_code' => '0410010030'
        ]);


        Procedure::create([
            'name' => 'EXERESE DE MAMILO',
            'sus_code' => '0410010049'
        ]);


        Procedure::create([
            'name' => 'MASTECTOMIA RADICAL C/ LINFADENECTOMIA',
            'sus_code' => '0410010057'
        ]);


        Procedure::create([
            'name' => 'MASTECTOMIA SIMPLES',
            'sus_code' => '0410010065'
        ]);


        Procedure::create([
            'name' => 'PLASTICA MAMARIA FEMININA NAO ESTETICA',
            'sus_code' => '0410010073'
        ]);


        Procedure::create([
            'name' => 'PLASTICA MAMARIA MASCULINA',
            'sus_code' => '0410010081'
        ]);


        Procedure::create([
            'name' => 'PLASTICA MAMARIA RECONSTRUTIVA - POS MASTECTOMIA C/ IMPLANTE DE PROTESE ',
            'sus_code' => '0410010090'
        ]);


        Procedure::create([
            'name' => 'REVERSAO DE MAMILO INVERTIDO',
            'sus_code' => '0410010103'
        ]);


        Procedure::create([
            'name' => 'SETORECTOMIA / QUADRANTECTOMIA',
            'sus_code' => '0410010111'
        ]);


        Procedure::create([
            'name' => 'SETORECTOMIA / QUADRANTECTOMIA C/ ESVAZIAMENTO GANGLIONAR',
            'sus_code' => '0410010120'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE PRÓTESE MAMÁRIA UNILATERAL EM CASOS DE COMPLICAÇÃO DA PRÓTESE MAMÁRIA IMPLANTADA',
            'sus_code' => '0410010138'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE PRÓTESE MAMÁRIA BILATERAL EM CASOS DE COMPLICAÇÃO DA PRÓTESE MAMÁRIA IMPLANTADA',
            'sus_code' => '0410010146'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE PRÓTESE MAMÁRIA UNILATERAL EM CASOS DE COMPLICAÇÃO DE IMPLANTAÇÃO DA PRÓTESE, COM IMPLANTAÇÃO DE NOVA PRÓTESE, NO MESMO ATO CIRÚRGICO',
            'sus_code' => '0410010154'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE PRÓTESE MAMÁRIA BILATERAL EM CASOS DE COMPLICAÇÃO DE IMPLANTAÇÃO DA PRÓTESE, COM IMPLANTAÇÃO DE NOVA PRÓTESE NO MESMO ATO CIRÚRGICO',
            'sus_code' => '0410010162'
        ]);


        Procedure::create([
            'name' => 'MASTECTOMIA SIMPLES BILATERAL SOB PROCESSO TRANSEXUALIZADOR',
            'sus_code' => '0410010197'
        ]);


        Procedure::create([
            'name' => 'PLASTICA MAMARIA RECONSTRUTIVA BILATERAL INCLUINDO PROTESE MAMARIA DE SILICONE BILATERAL NO PROCESSO TRANSEXUALIZADOR',
            'sus_code' => '0410010200'
        ]);


        Procedure::create([
            'name' => 'DESCOLAMENTO MANUAL DE PLACENTA ',
            'sus_code' => '0411010018'
        ]);


        Procedure::create([
            'name' => 'PARTO CESARIANO EM GESTACAO DE ALTO RISCO',
            'sus_code' => '0411010026'
        ]);


        Procedure::create([
            'name' => 'PARTO CESARIANO',
            'sus_code' => '0411010034'
        ]);


        Procedure::create([
            'name' => 'PARTO CESARIANO C/ LAQUEADURA TUBARIA',
            'sus_code' => '0411010042'
        ]);


        Procedure::create([
            'name' => 'REDUCAO MANUAL DE INVERSAO UTERINA AGUDA POS-PARTO',
            'sus_code' => '0411010050'
        ]);


        Procedure::create([
            'name' => 'RESSUTURA DE EPISIORRAFIA POS-PARTO',
            'sus_code' => '0411010069'
        ]);


        Procedure::create([
            'name' => 'SUTURA DE LACERACOES DE TRAJETO PELVICO',
            'sus_code' => '0411010077'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE INVERSAO UTERINA AGUDA POS PARTO',
            'sus_code' => '0411010085'
        ]);


        Procedure::create([
            'name' => 'CURETAGEM POS-ABORTAMENTO / PUERPERAL',
            'sus_code' => '0411020013'
        ]);


        Procedure::create([
            'name' => 'EMBRIOTOMIA',
            'sus_code' => '0411020021'
        ]);


        Procedure::create([
            'name' => 'HISTERECTOMIA PUERPERAL',
            'sus_code' => '0411020030'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE GRAVIDEZ ECTOPICA',
            'sus_code' => '0411020048'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE OUTROS TRANSTORNOS MATERNOS RELACIONADOS PREDOMINANTEMENTE A GRAVIDEZ',
            'sus_code' => '0411020056'
        ]);


        Procedure::create([
            'name' => 'BRONCOTOMIA E/OU BRONCORRAFIA ',
            'sus_code' => '0412010011'
        ]);


        Procedure::create([
            'name' => 'COLOCAÇÃO DE MOLDE BRONQUICO POR TORACOTOMIA',
            'sus_code' => '0412010020'
        ]);


        Procedure::create([
            'name' => 'COLOCAÇÃO DE PROTESE LARINGO-TRAQUEAL, TRAQUEAL, TRAQUEO-BRONQUICA, BRONQUICA POR VIA ENDOSCOPICA (INCLUI PROTESE)',
            'sus_code' => '0412010038'
        ]);


        Procedure::create([
            'name' => 'COLOCACAO DE PROTESE LARINGO TRAQUEAL/ TRAQUEO-BRONQUICA (INCLUI PRÓTESE)',
            'sus_code' => '0412010046'
        ]);


        Procedure::create([
            'name' => 'PUNCAO DE TRAQUEIA C/ ASPIRACAO ',
            'sus_code' => '0412010062'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE TRAQUÉIA MEDIASTINAL, CARINAL OU CARINOPLASTIA',
            'sus_code' => '0412010070'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE TUMOR DE TRAQUEIA COM ANASTOMOSE',
            'sus_code' => '0412010089'
        ]);


        Procedure::create([
            'name' => 'TRAQUEOPLASTIA POR ACESSO TORÁCICO',
            'sus_code' => '0412010097'
        ]);


        Procedure::create([
            'name' => 'TRAQUEOPLASTIA E/OU LARINGOTRAQUEOPLASTIA',
            'sus_code' => '0412010100'
        ]);


        Procedure::create([
            'name' => 'TRAQUEORRAFIA E/OU FECHAMENTO DE FISTULA TRAQUEO-CUTANEA',
            'sus_code' => '0412010119'
        ]);


        Procedure::create([
            'name' => 'TRAQUEOSTOMIA COM COLOCAÇÃO DE ORTESE TRAQUEAL OU TRAQUEOBRONQUICA',
            'sus_code' => '0412010127'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULA BRONCOPLEURAL COM AMPUTAÇÃO DE COTO BRONQUICO',
            'sus_code' => '0412010135'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FISTULA TRAQUEOESOFAGICA ADQUIRIDA',
            'sus_code' => '0412010143'
        ]);


        Procedure::create([
            'name' => 'MEDIASTINOTOMIA EXPLORADORA PARA-ESTERNAL / POR VIA ANTERIOR',
            'sus_code' => '0412020017'
        ]);


        Procedure::create([
            'name' => 'MEDIASTINOTOMIA EXTRAPLEURAL POR VIA POSTERIOR',
            'sus_code' => '0412020025'
        ]);

        Procedure::create([
            'name' => 'MEDIASTINOTOMIA P/ DRENAGEM',
            'sus_code' => '0412020033'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE TUMOR DO MEDIASTINO',
            'sus_code' => '0412020050'
        ]);


        Procedure::create([
            'name' => 'TIMECTOMIA',
            'sus_code' => '0412020068'
        ]);


        Procedure::create([
            'name' => 'TRAQUEOSTOMIA MEDIASTINAL',
            'sus_code' => '0412020076'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE MEDIASTINITE (QUALQUER VIA)',
            'sus_code' => '0412020084'
        ]);


        Procedure::create([
            'name' => 'DESCORTICAÇÃO PULMONAR',
            'sus_code' => '0412030012'
        ]);


        Procedure::create([
            'name' => 'FECHAMENTO DE PLEUROSTOMIA',
            'sus_code' => '0412030047'
        ]);


        Procedure::create([
            'name' => 'PLEURECTOMIA',
            'sus_code' => '0412030055'
        ]);


        Procedure::create([
            'name' => 'PLEUROTOMIA',
            'sus_code' => '0412030063'
        ]);


        Procedure::create([
            'name' => 'REPLEÇÃO DE CAVIDADE PLEURAL COM SOLUÇÃO PARA TRATAMENTO DE EMPIEMA CRONICO',
            'sus_code' => '0412030071'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE COAGULO RETIDO INTRATORACICO (QUALQUER VIA)',
            'sus_code' => '0412030080'
        ]);


        Procedure::create([
            'name' => 'PLEUROSTOMIA',
            'sus_code' => '0412030098'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM TUBULAR PLEURAL ABERTA (PLEUROSTOMIA)',
            'sus_code' => '0412030101'
        ]);


        Procedure::create([
            'name' => 'PLEURODESE',
            'sus_code' => '0412030110'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE DRENO TUBULAR TORACICO',
            'sus_code' => '0412030128'
        ]);


        Procedure::create([
            'name' => 'COSTECTOMIA',
            'sus_code' => '0412040018'
        ]);


        Procedure::create([
            'name' => 'ESTERNECTOMIA COM OU SEM PRÓTESE',
            'sus_code' => '0412040026'
        ]);


        Procedure::create([
            'name' => 'ESTERNECTOMIA SUBTOTAL',
            'sus_code' => '0412040034'
        ]);


        Procedure::create([
            'name' => 'LIGADURA DO DUCTO TORACICO (QUALQUER METODO)',
            'sus_code' => '0412040042'
        ]);


        Procedure::create([
            'name' => 'MOBILIZACAO DE RETALHOS MUSCULARES / DO OMENTO',
            'sus_code' => '0412040050'
        ]);


        Procedure::create([
            'name' => 'PLUMBAGEM EXTRAFASCIAL',
            'sus_code' => '0412040069'
        ]);


        Procedure::create([
            'name' => 'REDUÇÃO CIRÚRGICA DE FRATURA DE COSTELA',
            'sus_code' => '0412040085'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE TUMOR DO DIAFRAGMA E RECONSTRUÇÃO (QUALQUER TECNICA)',
            'sus_code' => '0412040107'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CORPO ESTRANHO DA PAREDE TORÁCICA',
            'sus_code' => '0412040115'
        ]);


        Procedure::create([
            'name' => 'TORACECTOMIA COM RECONSTRUÇÃO PARIETAL (POR PROTESE)',
            'sus_code' => '0412040123'
        ]);


        Procedure::create([
            'name' => 'TORACECTOMIA SEM RECONSTRUÇÃO PARIETAL',
            'sus_code' => '0412040131'
        ]);


        Procedure::create([
            'name' => 'TORACOPLASTIA (QUALQUER TECNICA)',
            'sus_code' => '0412040158'
        ]);


        Procedure::create([
            'name' => 'TORACOSTOMIA COM DRENAGEM PLEURAL FECHADA',
            'sus_code' => '0412040166'
        ]);


        Procedure::create([
            'name' => 'TORACOTOMIA EXPLORADORA',
            'sus_code' => '0412040174'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DEFEITOS CONGÊNITOS DO TORAX',
            'sus_code' => '0412040182'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FRATURA, NECROSE OU INFECÇÃO DO ESTERNO',
            'sus_code' => '0412040190'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE FRATURAS DO GRADIL COSTAL',
            'sus_code' => '0412040204'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE PAREDE TORACICA',
            'sus_code' => '0412040212'
        ]);


        Procedure::create([
            'name' => 'VAGOTOMIA TRONCULAR TERAPEUTICA POR TORACOTOMIA',
            'sus_code' => '0412040220'
        ]);


        Procedure::create([
            'name' => 'BULECTOMIA UNI OU BILATERAL',
            'sus_code' => '0412050013'
        ]);


        Procedure::create([
            'name' => 'LIGADURA DE ARTÉRIAS BRONQUICAS POR TORACOTOMIA PARA CONTROLE DE HEMOPTISE',
            'sus_code' => '0412050030'
        ]);


        Procedure::create([
            'name' => 'LOBECTOMIA PULMONAR',
            'sus_code' => '0412050048'
        ]);


        Procedure::create([
            'name' => 'PNEUMOMECTOMIA',
            'sus_code' => '0412050064'
        ]);


        Procedure::create([
            'name' => 'PNEUMONECTOMIA DE TOTALIZACAO ',
            'sus_code' => '0412050072'
        ]);


        Procedure::create([
            'name' => 'PNEUMORRAFIA',
            'sus_code' => '0412050080'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO EM CUNHA, TUMORECTOMIA / BIOPSIA DE PULMAO A CEU ABERTO',
            'sus_code' => '0412050102'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO PULMONAR ASSOCIADA A BRONCOPLASTIA/ ARTERIOPLASTIA',
            'sus_code' => '0412050110'
        ]);


        Procedure::create([
            'name' => 'CIRURGIA REDUTORA DO VOLUME PULMONAR (QUALQUER METODO)',
            'sus_code' => '0412050137'
        ]);


        Procedure::create([
            'name' => 'METASTASECTOMIA PULMONAR UNI OU BILATERAL (QUALQUER METODO)',
            'sus_code' => '0412050145'
        ]);


        Procedure::create([
            'name' => 'TROMBOENDARTERECTOMIA PULMONAR',
            'sus_code' => '0412050153'
        ]);


        Procedure::create([
            'name' => 'PNEUMOTOMIA COM RESSECÇÃO COSTAL PARA DRENAGEM CAVITARIA/RETIRADA DE CORPO ESTRANHO',
            'sus_code' => '0412050161'
        ]);


        Procedure::create([
            'name' => 'TORACOCENTESE/DRENAGEM DE PLEURA',
            'sus_code' => '0412050170'
        ]);


        Procedure::create([
            'name' => 'ATENDIMENTO DE URGENCIA EM MEDIO E GRANDE QUEIMADO',
            'sus_code' => '0413010015'
        ]);


        Procedure::create([
            'name' => 'ATENDIMENTO DE URGENCIA EM PEQUENO QUEIMADO',
            'sus_code' => '0413010023'
        ]);


        Procedure::create([
            'name' => 'CURATIVO EM GRANDE QUEIMADO',
            'sus_code' => '0413010031'
        ]);


        Procedure::create([
            'name' => 'CURATIVO EM MEDIO QUEIMADO',
            'sus_code' => '0413010040'
        ]);


        Procedure::create([
            'name' => 'CURATIVO EM PEQUENO QUEIMADO',
            'sus_code' => '0413010058'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE GRANDE QUEIMADO ',
            'sus_code' => '0413010066'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE INTERCORRENCIA EM PACIENTE MEDIO E GRANDE QUEIMADO',
            'sus_code' => '0413010074'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE MEDIO QUEIMADO',
            'sus_code' => '0413010082'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE PEQUENO QUEIMADO',
            'sus_code' => '0413010090'
        ]);


        Procedure::create([
            'name' => 'LIPOASPIRACAO DE GIBA OU REGIÃO SUBMANDIBULAR EM PACIENTES COM LIPODISTROFIA DECORRENTE DO USO DE ANTI-RETROVIRAl',
            'sus_code' => '0413030016'
        ]);


        Procedure::create([
            'name' => 'LIPOASPIRACAO DE PAREDE ABDOMINAL OU DORSO EM PACIENTES COM LIPODISTROFIA DECORRENTE DO USO DE ANTI-RETROVIRAl',
            'sus_code' => '0413030024'
        ]);


        Procedure::create([
            'name' => 'LIPOENXERTIA DE GLUTEO EM PACIENTE COM LIPODISTROFIA GLUTEA DECORRENTE DO USO DE ANTI-RETROVIRAL',
            'sus_code' => '0413030032'
        ]);


        Procedure::create([
            'name' => 'PREENCHIMENTO FACIAL COM POLIMETILMETACRILATO EM PACIENTE C/ LIPOATROFIA FACIAL CAUSADOS PELA REDUÇÃO DOS COXIS GORDUROSOS DAS REGIÕES MALAR, TEMPORAL',
            'sus_code' => '0413030040'
        ]);


        Procedure::create([
            'name' => 'PREENCHIMENTO FACIAL C/ TECIDO GORDUROSO EM PACIENTE C/ LIPOATROFIA DE FACE DECORRENTE DO USO DE ANTI-RETROVIRAIS',
            'sus_code' => '0413030059'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO GLUTEA E/OU PERIANAL EM PACIENTE C/ LIPODISTROFIA GLUTEA DECORRENTE DO USO DE ANTI-RETROVIRAL, COM LIPOENXERTIA OU PMMA',
            'sus_code' => '0413030067'
        ]);


        Procedure::create([
            'name' => 'REDUCAO MAMARIA EM PACIENTE C/ LIPODISTROFIA DECORRENTE DO USO DE ANTI-RETROVIRAIS',
            'sus_code' => '0413030075'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE GINECOMASTIA OU PSEUDOGINECOMASTIA EM PACIENTE C/ LIPODISTROFIA DECORRENTE DO USO DE ANTI-RETROVIRAIS',
            'sus_code' => '0413030083'
        ]);


        Procedure::create([
            'name' => 'AUTONOMIZACAO DE RETALHO ',
            'sus_code' => '0413040011'
        ]);


        Procedure::create([
            'name' => 'CORREÇÃO DE RETRAÇÃO CICATRICIAL VÁRIOS ESTÁGIOS',
            'sus_code' => '0413040020'
        ]);


        Procedure::create([
            'name' => 'DERMOLIPECTOMIA (1 OU 2 MEMBROS INFERIORES)',
            'sus_code' => '0413040038'
        ]);


        Procedure::create([
            'name' => 'DERMOLIPECTOMIA ABDOMINAL NAO ESTETICA (PLASTICA ABDOMINAL)',
            'sus_code' => '0413040046'
        ]);


        Procedure::create([
            'name' => 'DERMOLIPECTOMIA ABDOMINAL POS-CIRURGIA BARIATRICA',
            'sus_code' => '0413040054'
        ]);


        Procedure::create([
            'name' => 'DERMOLIPECTOMIA BRAQUIAL POS-CIRURGIA BARIÁTRICA',
            'sus_code' => '0413040062'
        ]);


        Procedure::create([
            'name' => 'DERMOLIPECTOMIA CRURAL POS-CIRURGIA BARIÁTRICA',
            'sus_code' => '0413040070'
        ]);


        Procedure::create([
            'name' => 'MAMOPLASTIA PÓS-CIRURGIA BARIÁTRICA',
            'sus_code' => '0413040089'
        ]);


        Procedure::create([
            'name' => 'PREPARO DE RETALHO',
            'sus_code' => '0413040097'
        ]);


        Procedure::create([
            'name' => 'PREPARO DE TUBO PEDICULADO',
            'sus_code' => '0413040100'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO DE LOBULO DA ORELHA',
            'sus_code' => '0413040119'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO DE POLO SUPERIOR DA ORELHA',
            'sus_code' => '0413040127'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO DO HELIX DA ORELHA ',
            'sus_code' => '0413040135'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO TOTAL DE ORELHA (MULTIPLOS ESTAGIOS)',
            'sus_code' => '0413040143'
        ]);


        Procedure::create([
            'name' => 'TRANSFERENCIA INTERMEDIARIA DE RETALHO',
            'sus_code' => '0413040151'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE ELEFANTIASE AO NIVEL DO PE',
            'sus_code' => '0413040160'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE LESOES EXTENSAS C/ PERDA DE SUBSTANCIA CUTANEA',
            'sus_code' => '0413040178'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE RETRACAO CICATRICIAL DA AXILA',
            'sus_code' => '0413040186'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE RETRACAO CICATRICIAL DO COTOVELO',
            'sus_code' => '0413040194'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE RETRACAO CICATRICIAL DOS DEDOS DA MAO/PE S/ COMPROMETIMENTO TENDINOSO',
            'sus_code' => '0413040208'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE RETRAÇÃO CICATRICIAL EM UM ESTÁGIO',
            'sus_code' => '0413040216'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO DE RETRACAO CICATRICIAL NA REGIAO POPLITEA',
            'sus_code' => '0413040224'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO NAO ESTETICO DA ORELHA',
            'sus_code' => '0413040232'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO P/ REPARACOES DE PERDA DE SUBSTANCIA DA MAO',
            'sus_code' => '0413040240'
        ]);


        Procedure::create([
            'name' => 'DERMOLIPECTOMIA ABDOMINAL CIRCUNFERENCIAL PÓS CIRURGIA BARIATRICA',
            'sus_code' => '0413040259'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUÇÃO POR MICROCIRURGIA QUALQUER PARTE',
            'sus_code' => '0413040267'
        ]);


        Procedure::create([
            'name' => 'MOLDAGEM / IMPLANTE EM MUCOSA (POR TRATAMENTO COMPLETO) ',
            'sus_code' => '0414010027'
        ]);


        Procedure::create([
            'name' => 'MOLDAGEM / IMPLANTE EM PELE / MUCOSA (POR TRATAMENTO COMPLETO)',
            'sus_code' => '0414010035'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FÍSTULA ORO-SINUSAL / ORO-NASAL ',
            'sus_code' => '0414010256'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FÍSTULA CUTÂNEA DE ORIGEM DENTÁRIA',
            'sus_code' => '0414010272'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE CISTO DO COMPLEXO MAXILO-MANDIBULAR',
            'sus_code' => '0414010329'
        ]);


        Procedure::create([
            'name' => 'EXCISÃO DE CÁLCULO DE GLÂNDULA SALIVAR',
            'sus_code' => '0414010345'
        ]);


        Procedure::create([
            'name' => 'EXERESE DE CISTO ODONTOGÊNICO E NÃO-ODONTOGÊNICO',
            'sus_code' => '0414010361'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE DENTE INCLUSO EM PACIENTE COM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0414010370'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE FÍSTULA INTRA / EXTRAORAL',
            'sus_code' => '0414010388'
        ]);


        Procedure::create([
            'name' => 'APICECTOMIA COM OU SEM OBTURAÇÃO RETRÓGRADA',
            'sus_code' => '0414020022'
        ]);


        Procedure::create([
            'name' => 'APROFUNDAMENTO DE VESTÍBULO ORAL (POR SEXTANTE)',
            'sus_code' => '0414020030'
        ]);


        Procedure::create([
            'name' => 'CORREÇÃO DE BRIDAS MUSCULARES ',
            'sus_code' => '0414020049'
        ]);


        Procedure::create([
            'name' => 'CORREÇÃO DE IRREGULARIDADES DE REBORDO ALVEOLAR',
            'sus_code' => '0414020057'
        ]);


        Procedure::create([
            'name' => 'CORREÇÃO DE TUBEROSIDADE DO MAXILAR',
            'sus_code' => '0414020065'
        ]);


        Procedure::create([
            'name' => 'CURETAGEM PERIAPICAL',
            'sus_code' => '0414020073'
        ]);


        Procedure::create([
            'name' => 'ENXERTO GENGIVAL',
            'sus_code' => '0414020081'
        ]);


        Procedure::create([
            'name' => 'ENXERTO ÓSSEO DE ÁREA DOADORA INTRABUCAL',
            'sus_code' => '0414020090'
        ]);


        Procedure::create([
            'name' => 'EXODONTIA DE DENTE DECÍDUO',
            'sus_code' => '0414020120'
        ]);


        Procedure::create([
            'name' => 'EXODONTIA DE DENTE PERMANENTE ',
            'sus_code' => '0414020138'
        ]);


        Procedure::create([
            'name' => 'EXODONTIA MÚLTIPLA COM ALVEOLOPLASTIA POR SEXTANTE',
            'sus_code' => '0414020146'
        ]);


        Procedure::create([
            'name' => 'GENGIVECTOMIA (POR SEXTANTE)',
            'sus_code' => '0414020154'
        ]);


        Procedure::create([
            'name' => 'GENGIVOPLASTIA (POR SEXTANTE) ',
            'sus_code' => '0414020162'
        ]);


        Procedure::create([
            'name' => 'GLOSSORRAFIA',
            'sus_code' => '0414020170'
        ]);


        Procedure::create([
            'name' => 'MARSUPIALIZAÇÃO DE CISTOS E PSEUDOCISTOS',
            'sus_code' => '0414020200'
        ]);


        Procedure::create([
            'name' => 'ODONTOSECÇÃO / RADILECTOMIA / TUNELIZAÇÃO',
            'sus_code' => '0414020219'
        ]);


        Procedure::create([
            'name' => 'REIMPLANTE E TRANSPLANTE DENTAL (POR ELEMENTO)',
            'sus_code' => '0414020243'
        ]);


        Procedure::create([
            'name' => 'REMOÇÃO DE DENTE RETIDO (INCLUSO / IMPACTADO)',
            'sus_code' => '0414020278'
        ]);


        Procedure::create([
            'name' => 'REMOÇÃO DE TORUS E EXOSTOSES',
            'sus_code' => '0414020294'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO DE HEMORRAGIA BUCO-DENTAL',
            'sus_code' => '0414020359'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO PARA TRACIONAMENTO DENTAL',
            'sus_code' => '0414020367'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRÚRGICO PERIODONTAL (POR SEXTANTE)',
            'sus_code' => '0414020375'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE ALVEOLITE',
            'sus_code' => '0414020383'
        ]);


        Procedure::create([
            'name' => 'ULOTOMIA/ULECTOMIA',
            'sus_code' => '0414020405'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO ODONTOLOGICO PARA PACIENTES COM NECESSIDADES ESPECIAIS',
            'sus_code' => '0414020413'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DENTÁRIO OSTEOINTEGRADO',
            'sus_code' => '0414020421'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO C/ CIRURGIAS MULTIPLAS ',
            'sus_code' => '0415010012'
        ]);


        Procedure::create([
            'name' => 'ProcedureS SEQUENCIAIS DE CIRURGIA PLÁSTICA REPARADORA PÓS -CIRURGIA BARIATRICA',
            'sus_code' => '0415020018'
        ]);


        Procedure::create([
            'name' => 'OUTROS ProcedureS COM CIRURGIAS SEQUENCIAIS',
            'sus_code' => '0415020034'
        ]);


        Procedure::create([
            'name' => 'ProcedureS SEQUENCIAIS EM ANOMALIA CRÂNIO E BUCOMAXILOFACIAL',
            'sus_code' => '0415020042'
        ]);


        Procedure::create([
            'name' => 'ProcedureS SEQUENCIAIS EM ONCOLOGIA',
            'sus_code' => '0415020050'
        ]);


        Procedure::create([
            'name' => 'ProcedureS SEQUENCIAIS EM ORTOPEDIA',
            'sus_code' => '0415020069'
        ]);


        Procedure::create([
            'name' => 'ProcedureS SEQUENCIAIS EM NEUROCIRURGIA',
            'sus_code' => '0415020077'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO CIRURGICO EM POLITRAUMATIZADO',
            'sus_code' => '0415030013'
        ]);


        Procedure::create([
            'name' => 'DEBRIDAMENTO DE FASCEITE NECROTIZANTE',
            'sus_code' => '0415040027'
        ]);


        Procedure::create([
            'name' => 'DEBRIDAMENTO DE ULCERA / DE TECIDOS DESVITALIZADOS',
            'sus_code' => '0415040035'
        ]);


        Procedure::create([
            'name' => 'DEBRIDAMENTO DE ULCERA / NECROSE',
            'sus_code' => '0415040043'
        ]);


        Procedure::create([
            'name' => 'DRENAGEM DE COLECOES VISCERAIS / CAVITARIAS POR CATETERISMO',
            'sus_code' => '0415040051'
        ]);


        Procedure::create([
            'name' => 'AMPUTACAO DE PENIS EM ONCOLOGIA ',
            'sus_code' => '0416010016'
        ]);


        Procedure::create([
            'name' => 'CISTECTOMIA TOTAL E DERIVACAO EM 1 SO TEMPO EM ONCOLOGIA',
            'sus_code' => '0416010024'
        ]);


        Procedure::create([
            'name' => 'CISTECTOMIA TOTAL COM DERIVAÇÃO SIMPLES EM ONCOLOGIA',
            'sus_code' => '0416010032'
        ]);


        Procedure::create([
            'name' => 'CISTOENTEROPLASTIA EM ONCOLOGIA ',
            'sus_code' => '0416010040'
        ]);


        Procedure::create([
            'name' => 'NEFRECTOMIA TOTAL EM ONCOLOGIA',
            'sus_code' => '0416010075'
        ]);


        Procedure::create([
            'name' => 'NEFROURETERECTOMIA TOTAL EM ONCOLOGIA',
            'sus_code' => '0416010091'
        ]);


        Procedure::create([
            'name' => 'ORQUIECTOMIA UNILATERAL EM ONCOLOGIA',
            'sus_code' => '0416010113'
        ]);


        Procedure::create([
            'name' => 'PROSTATECTOMIA EM ONCOLOGIA',
            'sus_code' => '0416010121'
        ]);


        Procedure::create([
            'name' => 'PROSTATOVESICULECTOMIA RADICAL EM ONCOLOGIA',
            'sus_code' => '0416010130'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE TUMORES MULTIPLOS E SIMULTANEOS DO TRATO URINARIO EM ONCOLOGIA',
            'sus_code' => '0416010164'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO ENDOSCOPICA DE TUMOR VESICAL EM ONCOLOGIA',
            'sus_code' => '0416010172'
        ]);


        Procedure::create([
            'name' => 'REIMPLANTE URETERAL EM ONCOLOGIA - URETEROCISTONEOSTOMIA',
            'sus_code' => '0416010180'
        ]);


        Procedure::create([
            'name' => 'REIMPLANTE URETERAL EM ONCOLOGIA - URETEROENTEROSTOMIA',
            'sus_code' => '0416010199'
        ]);


        Procedure::create([
            'name' => 'SUPRARRENALECTOMIA EM ONCOLOGIA ',
            'sus_code' => '0416010202'
        ]);


        Procedure::create([
            'name' => 'NEFRECTOMIA PARCIAL EM ONCOLOGIA',
            'sus_code' => '0416010210'
        ]);


        Procedure::create([
            'name' => 'AMPUTAÇÃO TOTAL AMPLIADA DE PENIS EM ONCOLOGIA',
            'sus_code' => '0416010229'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA PELVICA EM ONCOLOGIA',
            'sus_code' => '0416020020'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA RADICAL CERVICAL UNILATERAL EM ONCOLOGIA',
            'sus_code' => '0416020151'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA RADICAL MODIFICADA CERVICAL UNILATERAL EM ONCOLOGIA',
            'sus_code' => '0416020160'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA CERVICAL SUPRAOMO-HIOIDEA UNILATERAL EM ONCOLOGIA',
            'sus_code' => '0416020178'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA CERVICAL RECORRENCIAL UNILATERAL EM ONCOLOGIA',
            'sus_code' => '0416020186'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA MEDIASTINAL EM ONCOLOGIA',
            'sus_code' => '0416020194'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA SUPRACLAVICULAR UNILATERAL EM ONCOLOGIA ',
            'sus_code' => '0416020208'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA AXILAR UNILATERAL EM ONCOLOGIA',
            'sus_code' => '0416020216'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA RETROPERITONIAL EM ONCOLOGIA',
            'sus_code' => '0416020224'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA INGUINAL UNILATERAL EM ONCOLOGIA',
            'sus_code' => '0416020232'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA SELETIVA GUIADA (LINFONODO SENTINELA) EM ONCOLOGIA',
            'sus_code' => '0416020240'
        ]);


        Procedure::create([
            'name' => 'LINFADENECTOMIA INGUINO-ILIACA UNILATERAL EM ONCOLOGIA',
            'sus_code' => '0416020259'
        ]);


        Procedure::create([
            'name' => 'PAROTIDECTOMIA PARCIAL EM ONCOLOGIA',
            'sus_code' => '0416030017'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE GLANDULA SALIVAR MENOR EM ONCOLOGIA',
            'sus_code' => '0416030025'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE GLANDULA SUBLINGUAL EM ONCOLOGIA',
            'sus_code' => '0416030033'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE GLANDULA SUBMANDIBULAR EM ONCOLOGIA',
            'sus_code' => '0416030041'
        ]);


        Procedure::create([
            'name' => 'GLOSSECTOMIA PARCIAL EM ONCOLOGIA ',
            'sus_code' => '0416030068'
        ]);


        Procedure::create([
            'name' => 'GLOSSECTOMIA TOTAL EM ONCOLOGIA ',
            'sus_code' => '0416030076'
        ]);


        Procedure::create([
            'name' => 'PARATIREOIDECTOMIA TOTAL EM ONCOLOGIA',
            'sus_code' => '0416030084'
        ]);


        Procedure::create([
            'name' => 'PAROTIDECTOMIA TOTAL EM ONCOLOGIA ',
            'sus_code' => '0416030092'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO EM CUNHA DE LABIO E SUTURA EM ONCOLOGIA',
            'sus_code' => '0416030149'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO PARCIAL DE LABIO COM ENXERTO OU RETALHO EM ONCOLOGIA',
            'sus_code' => '0416030157'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO TOTAL DE LABIO E RECONSTRUCAO COM RETALHO MIOCUTANEO EM ONCOLOGIA',
            'sus_code' => '0416030165'
        ]);


        Procedure::create([
            'name' => 'MAXILECTOMIA PARCIAL EM ONCOLOGIA ',
            'sus_code' => '0416030173'
        ]);


        Procedure::create([
            'name' => 'MAXILECTOMIA TOTAL EM ONCOLOGIA ',
            'sus_code' => '0416030181'
        ]);


        Procedure::create([
            'name' => 'PELVIGLOSSOMANDIBULECTOMIA EM ONCOLOGIA',
            'sus_code' => '0416030190'
        ]);


        Procedure::create([
            'name' => 'PAROTIDECTOMIA TOTAL AMPLIADA EM ONCOLOGIA',
            'sus_code' => '0416030203'
        ]);


        Procedure::create([
            'name' => 'FARINGECTOMIA PARCIAL EM ONCOLOGIA',
            'sus_code' => '0416030211'
        ]);


        Procedure::create([
            'name' => 'FARINGECTOMIA TOTAL EM ONCOLOGIA',
            'sus_code' => '0416030220'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE TUMOR DE RINOFARINGE EM ONCOLOGIA',
            'sus_code' => '0416030238'
        ]);


        Procedure::create([
            'name' => 'EXENTERAÇÃO DE ÓRBITA EM ONCOLOGIA',
            'sus_code' => '0416030246'
        ]);


        Procedure::create([
            'name' => 'LARINGECTOMIA PARCIAL EM ONCOLOGIA',
            'sus_code' => '0416030254'
        ]);


        Procedure::create([
            'name' => 'LARINGECTOMIA TOTAL EM ONCOLOGIA',
            'sus_code' => '0416030262'
        ]);


        Procedure::create([
            'name' => 'TIREOIDECTOMIA TOTAL EM ONCOLOGIA ',
            'sus_code' => '0416030270'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUÇÃO PARA FONAÇÂO EM ONCOLOGIA',
            'sus_code' => '0416030289'
        ]);


        Procedure::create([
            'name' => 'TRAQUEOSTOMIA TRANSTUMORAL EM ONCOLOGIA',
            'sus_code' => '0416030297'
        ]);


        Procedure::create([
            'name' => 'MANDIBULECTOMIA PARCIAL EM ONCOLOGIA',
            'sus_code' => '0416030300'
        ]);


        Procedure::create([
            'name' => 'MANDIBULECTOMIA TOTAL EM ONCOLOGIA',
            'sus_code' => '0416030319'
        ]);


        Procedure::create([
            'name' => 'RESSECÇÃO DE PAVILHÃO AURICULAR EM ONCOLOGIA',
            'sus_code' => '0416030327'
        ]);


        Procedure::create([
            'name' => 'LIGADURA DE CARÓTIDA EM ONCOLOGIA ',
            'sus_code' => '0416030335'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE TUMOR GLOMICO EM ONCOLOGIA',
            'sus_code' => '0416030343'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE LESAO MALIGNA DE MUCOSA BUCAL EM ONCOLOGIA ',
            'sus_code' => '0416030351'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE TUMOR TIREOIDIANO POR VIA TRANSESTERNAL EM ONCOLOGIA',
            'sus_code' => '0416030360'
        ]);


        Procedure::create([
            'name' => 'ANASTOMOSE BILEO-DIGESTIVA EM ONCOLOGIA',
            'sus_code' => '0416040012'
        ]);


        Procedure::create([
            'name' => 'COLEDOCOSTOMIA C/ OU S/ COLECISTECTOMIA EM ONCOLOGIA',
            'sus_code' => '0416040020'
        ]);


        Procedure::create([
            'name' => 'ESOFAGOGASTRECTOMIA COM TORACOTOMIA EM ONCOLOGIA',
            'sus_code' => '0416040039'
        ]);


        Procedure::create([
            'name' => 'ESOFAGOCOLOPLASTIA OU ESOFAGOGASTROPLASTIA EM ONCOLOGIA ',
            'sus_code' => '0416040047'
        ]);


        Procedure::create([
            'name' => 'ESOFAGOGASTRECTOMIA SEM TORACOTOMIA EM ONCOLOGIA',
            'sus_code' => '0416040055'
        ]);


        Procedure::create([
            'name' => 'GASTRECTOMIA TOTAL EM ONCOLOGIA ',
            'sus_code' => '0416040071'
        ]);


        Procedure::create([
            'name' => 'HEPATECTOMIA PARCIAL EM ONCOLOGIA ',
            'sus_code' => '0416040101'
        ]);


        Procedure::create([
            'name' => 'PANCREATECTOMIA PARCIAL EM ONCOLOGIA',
            'sus_code' => '0416040110'
        ]);


        Procedure::create([
            'name' => 'DUODENOPANCREATECTOMIA EM ONCOLOGIA',
            'sus_code' => '0416040128'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE TUMOR RETROPERITONIAL C/ RESSECCAO DE ORGAOS CONTIGUOS EM ONCOLOGIA ',
            'sus_code' => '0416040144'
        ]);


        Procedure::create([
            'name' => 'ALCOOLIZAÇÃO PERCUTÂNEA DE CARCINOMA HEPÁTICO',
            'sus_code' => '0416040179'
        ]);


        Procedure::create([
            'name' => 'TRATAMENTO DE CARCINOMA HEPÁTICO POR RADIOFREQUÊNCIA',
            'sus_code' => '0416040187'
        ]);


        Procedure::create([
            'name' => 'QUIMIOEMBOLIZAÇÃO DE CARCINOMA HEPÁTICO',
            'sus_code' => '0416040195'
        ]);


        Procedure::create([
            'name' => 'BIOPSIAS MULTIPLAS INTRA-ABDOMINAIS EM ONCOLOGIA',
            'sus_code' => '0416040209'
        ]);


        Procedure::create([
            'name' => 'GASTRECTOMIA PARCIAL EM ONCOLOGIA ',
            'sus_code' => '0416040217'
        ]);


        Procedure::create([
            'name' => 'METASTASECTOMIA HEPÁTICA EM ONCOLOGIA',
            'sus_code' => '0416040225'
        ]);


        Procedure::create([
            'name' => 'COLECISTECTOMIA EM ONCOLOGIA',
            'sus_code' => '0416040233'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO AMPLIADA DE VIA BILIAR EXTRA-HEPATICA EM ONCOLOGIA',
            'sus_code' => '0416040241'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE TUMOR RETROPERITONIAL EM ONCOLOGIA',
            'sus_code' => '0416040250'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO ALARGADA DE TUMOR DE PARTES MOLES DE PAREDE ABDOMINAL EM ONCOLOGIA ',
            'sus_code' => '0416040268'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO ALARGADA DE TUMOR DE INTESTINO EM ONCOLOGIA',
            'sus_code' => '0416040276'
        ]);


        Procedure::create([
            'name' => 'AMPUTACAO ABDOMINO-PERINEAL DE RETO EM ONCOLOGIA',
            'sus_code' => '0416050018'
        ]);


        Procedure::create([
            'name' => 'COLECTOMIA PARCIAL (HEMICOLECTOMIA) EM ONCOLOGIA',
            'sus_code' => '0416050026'
        ]);


        Procedure::create([
            'name' => 'COLECTOMIA TOTAL EM ONCOLOGIA ',
            'sus_code' => '0416050034'
        ]);


        Procedure::create([
            'name' => 'EXCISAO LOCAL DE TUMOR DO RETO EM ONCOLOGIA',
            'sus_code' => '0416050050'
        ]);


        Procedure::create([
            'name' => 'RETOSSIGMOIDECTOMIA ABDOMINAL EM ONCOLOGIA',
            'sus_code' => '0416050077'
        ]);


        Procedure::create([
            'name' => 'EXENTERACAO PELVICA POSTERIOR EM ONCOLOGIA',
            'sus_code' => '0416050093'
        ]);


        Procedure::create([
            'name' => 'EXENTERACAO PELVICA TOTAL EM ONCOLOGIA',
            'sus_code' => '0416050107'
        ]);


        Procedure::create([
            'name' => 'PROCTOCOLECTOMIA TOTAL EM ONCOLOGIA',
            'sus_code' => '0416050115'
        ]);


        Procedure::create([
            'name' => 'AMPUTACAO CONICA DE COLO DE UTERO C/ COLPECTOMIA EM ONCOLOGIA',
            'sus_code' => '0416060013'
        ]);


        Procedure::create([
            'name' => 'ANEXECTOMIA UNI / BILATERAL EM ONCOLOGIA',
            'sus_code' => '0416060021'
        ]);


        Procedure::create([
            'name' => 'COLPECTOMIA EM ONCOLOGIA ',
            'sus_code' => '0416060030'
        ]);


        Procedure::create([
            'name' => 'HISTERECTOMIA C/ RESSECCAO DE ORGAOS CONTIGUOS EM ONCOLOGIA',
            'sus_code' => '0416060056'
        ]);


        Procedure::create([
            'name' => 'HISTERECTOMIA TOTAL AMPLIADA EM ONCOLOGIA',
            'sus_code' => '0416060064'
        ]);


        Procedure::create([
            'name' => 'TRAQUELECTOMIA RADICAL EM ONCOLOGIA',
            'sus_code' => '0416060080'
        ]);


        Procedure::create([
            'name' => 'VULVECTOMIA TOTAL AMPLIADA C/ LINFADENECTOMIA EM ONCOLOGIA',
            'sus_code' => '0416060099'
        ]);


        Procedure::create([
            'name' => 'VULVECTOMIA PARCIAL EM ONCOLOGIA',
            'sus_code' => '0416060102'
        ]);


        Procedure::create([
            'name' => 'HISTERECTOMIA COM OU SEM ANEXECTOMIA (UNI / BILATERAL) EM ONCOLOGIA',
            'sus_code' => '0416060110'
        ]);


        Procedure::create([
            'name' => 'LAPAROTOMIA PARA AVALIAÇÃO DE TUMOR DE OVARIO EM ONCOLOGIA',
            'sus_code' => '0416060129'
        ]);


        Procedure::create([
            'name' => 'EXCISAO E ENXERTO DE PELE EM ONCOLOGIA',
            'sus_code' => '0416080014'
        ]);


        Procedure::create([
            'name' => 'EXCISAO E SUTURA COM PLASTICA EM Z NA PELE EM ONCOLOGIA ',
            'sus_code' => '0416080030'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO C/ RETALHO MIOCUTANEO (QUALQUER PARTE) EM ONCOLOGIA',
            'sus_code' => '0416080081'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO POR MICROCIRURGIA (QUALQUER PARTE) EM ONCOLOGIA',
            'sus_code' => '0416080090'
        ]);


        Procedure::create([
            'name' => 'RECONSTRUCAO C/ RETALHO OSTEOMIOCUTANEO EM ONCOLOGIA',
            'sus_code' => '0416080111'
        ]);


        Procedure::create([
            'name' => 'EXTIRPACAO MULTIPLA DE LESAO DA PELE OU TECIDO CELULAR SUBCUTANEO EM ONCOLOGIA ',
            'sus_code' => '0416080120'
        ]);


        Procedure::create([
            'name' => 'AMPUTACAO / DESARTICULACAO DE MEMBROS INFERIORES EM ONCOLOGIA',
            'sus_code' => '0416090010'
        ]);


        Procedure::create([
            'name' => 'AMPUTACAO / DESARTICULACAO DE MEMBROS SUPERIORES EM ONCOLOGIA',
            'sus_code' => '0416090028'
        ]);


        Procedure::create([
            'name' => 'HEMIPELVECTOMIA EM ONCOLOGIA',
            'sus_code' => '0416090036'
        ]);


        Procedure::create([
            'name' => 'SACRALECTOMIA (ENDOPELVECTOMIA) EM ONCOLOGIA',
            'sus_code' => '0416090079'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE TUMOR OSSEO COM SUBSTITUICAO (ENDOPROTESE) OU COM RECONSTRUÇÃO E FIXAÇÃO EM ONCOLOGIA',
            'sus_code' => '0416090109'
        ]);


        Procedure::create([
            'name' => 'DESARTICULACAO INTERESCAPULO-TORACICA EM ONCOLOGIA',
            'sus_code' => '0416090117'
        ]);


        Procedure::create([
            'name' => 'DESARTICULACAO ESCAPULO-TORACICA INTERNA EM ONCOLOGIA',
            'sus_code' => '0416090125'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE TUMOR DE PARTES MOLES EM ONCOLOGIA',
            'sus_code' => '0416090133'
        ]);


        Procedure::create([
            'name' => 'LOBECTOMIA PULMONAR EM ONCOLOGIA',
            'sus_code' => '0416110010'
        ]);


        Procedure::create([
            'name' => 'PNEUMOMECTOMIA RADICAL EM ONCOLOGIA',
            'sus_code' => '0416110029'
        ]);


        Procedure::create([
            'name' => 'TORACECTOMIA COMPLEXA EM ONCOLOGIA',
            'sus_code' => '0416110037'
        ]);


        Procedure::create([
            'name' => 'TORACECTOMIA SIMPLES EM ONCOLOGIA ',
            'sus_code' => '0416110045'
        ]);


        Procedure::create([
            'name' => 'TORACOTOMIA EXPLORADORA EM ONCOLOGIA',
            'sus_code' => '0416110053'
        ]);


        Procedure::create([
            'name' => 'SEGMENTECTOMIA PULMONAR EM ONCOLOGIA',
            'sus_code' => '0416110061'
        ]);


        Procedure::create([
            'name' => 'RESSECÇAO PULMONAR EM CUNHA EM ONCOLOGIA',
            'sus_code' => '0416110070'
        ]);


        Procedure::create([
            'name' => 'TIMECTOMIA EM ONCOLOGIA',
            'sus_code' => '0416110088'
        ]);


        Procedure::create([
            'name' => 'MASTECTOMIA RADICAL C/ LINFADENECTOMIA AXILAR EM ONCOLOGIA',
            'sus_code' => '0416120024'
        ]);


        Procedure::create([
            'name' => 'MASTECTOMIA SIMPLES EM ONCOLOGIA',
            'sus_code' => '0416120032'
        ]);


        Procedure::create([
            'name' => 'RESSECCAO DE LESAO NAO PALPAVEL DE MAMA COM MARCACAO EM ONCOLOGIA (POR MAMA) ',
            'sus_code' => '0416120040'
        ]);


        Procedure::create([
            'name' => 'SEGMENTECTOMIA/QUADRANTECTOMIA/SETORECTOMIA DE MAMA EM ONCOLOGIA',
            'sus_code' => '0416120059'
        ]);


        Procedure::create([
            'name' => 'ANESTESIA OBSTETRICA P/ CESARIANA ',
            'sus_code' => '0417010010'
        ]);


        Procedure::create([
            'name' => 'ANALGESIA OBSTETRICA P/ PARTO NORMAL',
            'sus_code' => '0417010028'
        ]);


        Procedure::create([
            'name' => 'ANESTESIA OBSTETRICA P/CESARIANA EM GESTACAO DE ALTO RISCO',
            'sus_code' => '0417010036'
        ]);


        Procedure::create([
            'name' => 'ANESTESIA GERAL',
            'sus_code' => '0417010044'
        ]);


        Procedure::create([
            'name' => 'ANESTESIA REGIONAL',
            'sus_code' => '0417010052'
        ]);


        Procedure::create([
            'name' => 'SEDACAO',
            'sus_code' => '0417010060'
        ]);


        Procedure::create([
            'name' => 'CONFECCAO DE FISTULA ARTERIO-VENOSA C/ ENXERTIA DE POLITETRAFLUORETILENO (PTFE)',
            'sus_code' => '0418010013'
        ]);


        Procedure::create([
            'name' => 'CONFECCAO DE FISTULA ARTERIO-VENOSA C/ ENXERTO AUTOLOGO ',
            'sus_code' => '0418010021'
        ]);


        Procedure::create([
            'name' => 'CONFECCAO DE FISTULA ARTERIO-VENOSA P/ HEMODIALISE',
            'sus_code' => '0418010030'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE CATETER DE LONGA PERMANÊNCIA P/ HEMODIALISE ',
            'sus_code' => '0418010048'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE CATETER DUPLO LUMEN NA IRA (INCLUI CATETER) ',
            'sus_code' => '0418010056'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE CATETER DUPLO LUMEN P/HEMODIALISE',
            'sus_code' => '0418010064'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE CATETER TENCKHOFF OU SIMILAR DE LONGA PERMANÊNCIA NA IRA (INCLUI CATETER)',
            'sus_code' => '0418010072'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE CATETER TIPO TENCKHOFF OU SIMILAR P/ DPA/DPAC',
            'sus_code' => '0418010080'
        ]);


        Procedure::create([
            'name' => 'IMPLANTE DE CATETER TIPO TENCKOFF OU SIMILAR P/DPI',
            'sus_code' => '0418010099'
        ]);


        Procedure::create([
            'name' => 'INTERVENCAO EM FISTULA ARTERIO-VENOSA',
            'sus_code' => '0418020019'
        ]);


        Procedure::create([
            'name' => 'LIGADURA DE FISTULA ARTERIO-VENOSA',
            'sus_code' => '0418020027'
        ]);


        Procedure::create([
            'name' => 'RETIRADA DE CATETER TIPO TENCKHOFF / SIMILAR DE LONGA PERMANÊNCIA',
            'sus_code' => '0418020035'
        ]);


    }
}
